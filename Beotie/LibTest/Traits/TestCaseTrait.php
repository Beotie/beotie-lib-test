<?php
declare(strict_types=1);
/**
 * This file is part of beotie/lib_test
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.1
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace Beotie\LibTest\Traits;

use PHPUnit\Framework\TestCase;

/**
 * Test case trait
 *
 * This trait is used to wrap test case feature
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait TestCaseTrait
{
    /**
     * Property reflection
     *
     * This property store a cache of PropertyReflection
     *
     * @var \ArrayObject
     */
    private $propertyReflections;

    /**
     * Call
     *
     * Interpretion hook for use TestCase methods
     *
     * @param string $methodName The invoked method name
     * @param array  $arguments  The invoked method argument
     *
     * @throws \LogicException in case of unexisting method
     * @return mixed
     */
    public function __call(string $methodName, array $arguments)
    {
        if (method_exists($this->getTestCase(), $methodName)) {
            return call_user_func_array([$this->getTestCase(), $methodName], $arguments);
        }

        throw new \LogicException(sprintf('Calling unexistant method "%s"', $methodName));
    }

    /**
     * Create empty instance
     *
     * Create and return a new empty instance of the tested class
     *
     * @return object
     */
    protected function createEmptyInstance()
    {
        $reflex = new \ReflectionClass($this->getTestedInstance());
        return $reflex->newInstanceWithoutConstructor();
    }

    /**
     * Set value
     *
     * Inject a value into a object property
     *
     * @param object $instance An object whence extract the property value
     * @param string $property The property name where the value is stored
     * @param mixed  $value    The value to inject
     *
     * @throws \LogicException If the given instance is not an object
     * @throws \LogicException If the property cannot be resolved into the inheritance tree
     * @return $this
     */
    protected function setValue($instance, string $property, $value)
    {
        if (!is_object($instance)) {
            throw new \LogicException('Cannot set value into non object');
        }

        $this->getPropertyReflection(get_class($instance), $property)->setValue($instance, $value);
        return $this;
    }

    /**
     * Get value
     *
     * Return the value of an object property
     *
     * @param object $instance An object whence extract the property value
     * @param string $property The property name where the value is stored
     *
     * @throws \LogicException If the given instance is not an object
     * @throws \LogicException If the property cannot be resolved into the inheritance tree
     * @return mixed
     */
    protected function getValue($instance, string $property)
    {
        if (!is_object($instance)) {
            throw new \LogicException('Cannot get value from non object');
        }

        return $this->getPropertyReflection(get_class($instance), $property)->getValue($instance);
    }

    /**
     * Get property reflection
     *
     * Return a ReflectionProperty, according to the instance class name and property. Make usage of internal cache
     * to provide knowned reflection property.
     *
     * @param string $instanceClassName The base instance class name
     * @param string $property          The property name to find
     *
     * @throws \LogicException If the property cannot be resolved into the inheritance tree
     * @return \ReflectionProperty
     */
    protected function getPropertyReflection(string $instanceClassName, string $property) : \ReflectionProperty
    {
        $cacheKey = sprintf('%s::%s', $instanceClassName, $property);
        if (null === $this->propertyReflections) {
            $this->propertyReflections = new \ArrayObject();
        }

        if ($this->propertyReflections->offsetExists($cacheKey)) {
            return $this->propertyReflections->offsetGet($cacheKey);
        }

        $reflex = $this->createPropertyReflection($instanceClassName, $property);

        if (!$reflex) {
            throw new \LogicException(sprintf('Property "%s" cannot be resolved', $property));
        }
        $this->propertyReflections->offsetSet($cacheKey, $reflex);
        return $reflex;
    }

    /**
     * Create property reflection
     *
     * Return a reflection property, according to the instance class name and property. Abble to follow the
     * inheritance tree to find the property.
     *
     * @param string $instanceClassName The base instance class name
     * @param string $property          The property name to find
     *
     * @return \ReflectionProperty|NULL
     */
    protected function createPropertyReflection(string $instanceClassName, string $property) : ?\ReflectionProperty
    {
        $reflectionClass = new \ReflectionClass($instanceClassName);

        if ($reflectionClass->hasProperty($property)) {
            $propertyReflection = $reflectionClass->getProperty($property);
            $propertyReflection->setAccessible(true);
            return $propertyReflection;
        }

        $parentClass = $reflectionClass->getParentClass();
        if (!$parentClass) {
            return null;
        }

        return $this->createPropertyReflection($parentClass->getName(), $property);
    }

    /**
     * Get TestCase
     *
     * Return the current TestCase
     *
     * @return TestCase
     */
    protected function getTestCase() : TestCase
    {
        return $this;
    }
}
