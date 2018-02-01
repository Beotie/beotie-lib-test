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

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * Test trait test
 *
 * This test case is used to validate the TestTrait logic
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class TestTraitTest extends TestCase
{
    /**
     * Get tested class
     *
     * Return a TestedClass instance with constructor argument
     *
     * @param mixed $prop The TestedClass constructor argument
     *
     * @return TestedClass
     */
    public function getTestedClass($prop) : TestedClass
    {
        return new TestedClass($prop);
    }

    /**
     * Get TestClass
     *
     * Return a TestClass instance
     *
     * @return TestClass
     */
    public function getTestClass() : TestClass
    {
        $testClass = new TestClass();
        $testClass->testCase = $this->createMock(TestCase::class);

        return $testClass;
    }

    /**
     * Test createEmptyInstance
     *
     * This method is used to validate the TestTrait::createEmptyInstance method logic
     *
     * @return void
     */
    public function testCreateEmptyInstance() : void
    {
        $instance = $this->getTestClass();

        $instance->testedInstance = \stdClass::class;
        $this->assertInstanceOf(\stdClass::class, $instance->getEmptyInstance());

        $testedClass = $this->getTestedClass('val');
        $className = get_class($testedClass);
        $instance->testedInstance = $className;
        $this->assertInstanceOf($className, $instance->getEmptyInstance());

        $property = new \ReflectionProperty($className, 'property');
        $property->setAccessible(true);
        $this->assertNull($property->getValue($instance->getEmptyInstance()));

        return;
    }

    /**
     * Test getValue
     *
     * This method is used to validate the TestTrait::getValue method logic
     *
     * @return void
     */
    public function testGetValue() : void
    {
        $instance = $this->getTestClass();
        $testedClass = $this->getTestedClass('val');
        $className = get_class($testedClass);
        $instance->testedInstance = $className;

        $this->assertEquals('val', $instance->getVal($testedClass, 'property'));

        $testedClass = $this->getTestedClass('tor');
        $testedClass->traitProperty = 'tue';
        $this->assertEquals('tue', $instance->getVal($testedClass, 'traitProperty'));

        $this->assertEquals('here we go', $instance->getVal($testedClass, 'testedProperty'));

        $testedClass = $this->getTestedClass('value');
        $this->assertEquals('value', $instance->getVal($testedClass, 'property'));

        $this->expectException(\LogicException::class);
        $instance->getVal('string', 'property');

        return;
    }

    /**
     * Test setValue
     *
     * This method is used to validate the TestTrait::setValue method logic
     *
     * @return void
     */
    public function testSetValue() : void
    {
        $instance = $this->getTestClass();
        $testedClass = $this->getTestedClass('val');
        $className = get_class($testedClass);
        $instance->testedInstance = $className;

        $reflex = new \ReflectionClass($className);
        $property = $reflex->getProperty('property');
        $property->setAccessible(true);

        $this->assertEquals('val', $property->getValue($testedClass));
        $this->assertSame($instance, $instance->setVal($testedClass, 'property', 'eratum'));
        $this->assertEquals('eratum', $property->getValue($testedClass));

        $this->expectException(\LogicException::class);
        $instance->setVal('string', 'property', 'val');

        return;
    }

    /**
     * Test getValue
     *
     * This method is used to validate the TestTrait::getValue method logic in case of unexisting value
     *
     * @return void
     */
    public function testGetUndefinedProperty()
    {
        $this->expectException(\LogicException::class);

        $instance = $this->getTestClass();
        $testedClass = $this->getTestedClass('val');

        $instance->getVal($testedClass, 'val');
    }

    /**
     * Test setValue
     *
     * This method is used to validate the TestTrait::setValue method logic in case of unexisting value
     *
     * @return void
     */
    public function testSetUndefinedProperty()
    {
        $this->expectException(\LogicException::class);

        $instance = $this->getTestClass();
        $testedClass = $this->getTestedClass('val');

        $instance->setVal($testedClass, 'val', 12);
    }

    /**
     * Dynamic provider
     *
     * Return a set of method name and argument to dynamically call
     *
     * @return string[][]|boolean[][]
     */
    public function dynamicProvider()
    {
        return [
            ['assertTrue', [true], null],
            ['assertFalse', [false], null],
            ['assertEquals', ['azerty', 'azerty'], null],
            ['assertEquals', ['azerty', 'azert'], ExpectationFailedException::class],
            ['assertArrayHasKey', ['azerty', ['azerty' => 'qwerty']], null],
            ['assertArrayHasKey', ['azerty', ['azert' => 'qwerty']], ExpectationFailedException::class],
            ['assertEmpty', [[]], null],
            ['assertEmpty', [[12]], ExpectationFailedException::class],
        ];
    }

    /**
     * Test dynamic invocation
     *
     * This method is used to validate the TestTrait::__call method logic
     *
     * @param string $method    The method to invoke
     * @param array  $arguments The method arguments
     * @param string $exception The expected exception, or null
     *
     * @return       void
     * @dataProvider dynamicProvider
     */
    public function testDynamicInvocation(string $method, array $arguments, string $exception = null) : void
    {
        if ($exception) {
            $this->expectException($exception);
        }

        $instance = $this->getTestClass();
        $instance->testCase = $this;

        call_user_func_array([$instance, $method], $arguments);

        return;
    }
}
