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
namespace Beotie\LibTest\Tests;

use Beotie\LibTest\Traits\TestTrait;
use PHPUnit\Framework\TestCase;
use Beotie\LibTest\Traits\TestCaseTrait;

/**
 * Test class
 *
 * This class is used to access internal logic, with inheritance and trait usage.
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class TestClass
{
    use TestTrait, TestCaseTrait;

    /**
     * Tested instance
     *
     * The instance validated by the TestClass
     *
     * @var string
     */
    public $testedInstance;

    /**
     * Test case
     *
     * This property store a TestCase instance
     *
     * @var TestCase
     */
    public $testCase;

    /**
     * Tested property
     *
     * Property used by TestedClass to validate the TestTrait logic
     *
     * @var string
     */
    private $testedProperty = 'here we go';

    /**
     * Create empty instance
     *
     * Create and return a new empty instance of the tested class
     *
     * @return object
     */
    public function getEmptyInstance()
    {
        return $this->createEmptyInstance();
    }

    /**
     * Get val
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
    public function getVal($instance, string $property)
    {
        return $this->getValue($instance, $property);
    }

    /**
     * Set val
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
    public function setVal($instance, string $property, $value) : TestClass
    {
        return $this->setValue($instance, $property, $value);
    }

    /**
     * Get tested instance
     *
     * Return the tested instance name
     *
     * @return string
     */
    protected function getTestedInstance() : string
    {
        return $this->testedInstance;
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
        return $this->testCase;
    }
}
