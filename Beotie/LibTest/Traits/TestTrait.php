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
 * Test trait
 *
 * This trait is used to wrap trait test feature
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 * @method   assertArrayHasKey
 * @method   assertArraySubset
 * @method   assertArrayNotHasKey
 * @method   assertContains
 * @method   assertAttributeContains
 * @method   assertNotContains
 * @method   assertAttributeNotContains
 * @method   assertContainsOnly
 * @method   assertContainsOnlyInstancesOf
 * @method   assertAttributeContainsOnly
 * @method   assertNotContainsOnly
 * @method   assertAttributeNotContainsOnly
 * @method   assertCount
 * @method   assertAttributeCount
 * @method   assertNotCount
 * @method   assertAttributeNotCount
 * @method   assertEquals
 * @method   assertAttributeEquals
 * @method   assertNotEquals
 * @method   assertAttributeNotEquals
 * @method   assertEmpty
 * @method   assertAttributeEmpty
 * @method   assertNotEmpty
 * @method   assertAttributeNotEmpty
 * @method   assertGreaterThan
 * @method   assertAttributeGreaterThan
 * @method   assertGreaterThanOrEqual
 * @method   assertAttributeGreaterThanOrEqual
 * @method   assertLessThan
 * @method   assertAttributeLessThan
 * @method   assertLessThanOrEqual
 * @method   assertAttributeLessThanOrEqual
 * @method   assertFileEquals
 * @method   assertFileNotEquals
 * @method   assertStringEqualsFile
 * @method   assertStringNotEqualsFile
 * @method   assertIsReadable
 * @method   assertNotIsReadable
 * @method   assertIsWritable
 * @method   assertNotIsWritable
 * @method   assertDirectoryExists
 * @method   assertDirectoryNotExists
 * @method   assertDirectory
 * @method   IsReadable
 * @method   assertDirectoryNotIsReadable
 * @method   assertDirectoryIsWritable
 * @method   assertDirectoryNotIsWritable
 * @method   assertFileExists
 * @method   assertFileNotExists
 * @method   assertFileIsReadable
 * @method   assertFileNotIsReadable
 * @method   assertFileIsWritable
 * @method   assertFileNotIsWrit
 * @method   able
 * @method   assertTrue
 * @method   assertNotTrue
 * @method   assertFalse
 * @method   assertNotFalse
 * @method   assertNull
 * @method   assertNotNull
 * @method   assertFinite
 * @method   assertInfinite
 * @method   assertNan
 * @method   assertClassHasAttribute
 * @method   assertClassNotHasAttribute
 * @method   assertClassHasStaticAttribute
 * @method   assertClassNotHasStaticAttribute
 * @method   assertObjectHasAttribute
 * @method   assertObjectNotHasAttribute
 * @method   assertSame
 * @method   assertAttributeSame
 * @method   assertNotSame
 * @method   assertAttributeNotSame
 * @method   assertInstanceOf
 * @method   assertAttributeInstanceOf
 * @method   assertNotInstanceOf
 * @method   assertAttributeNotInstanceOf
 * @method   assertInternalType
 * @method   assertAttributeInternalType
 * @method   assertNotInternalType
 * @method   assertAttributeNotInternalType
 * @method   assertRegExp
 * @method   assertNotRegExp
 * @method   assertSameSize
 * @method   assertNotSameSize
 * @method   assertStringMatchesFormat
 * @method   assertStringNotMatchesFormat
 * @method   assertStringMatchesFormatFile
 * @method   assertStringNotMatchesFormatFile
 * @method   assertStringStartsWith
 * @method   assertStringStartsNotWith
 * @method   assertStringEndsWith
 * @method   assertStringEndsNotWith
 * @method   assertXmlFileEqualsXmlFile
 * @method   assertXmlFileNotEqualsXmlFile
 * @method   assertXmlStringEqualsXmlFile
 * @method   assertXmlStringNotEqualsXmlFile
 * @method   assertXmlStringEqualsXmlString
 * @method   assertXmlStringNotEqualsXmlString
 * @method   assertEqualXMLStructure
 * @method   assertThat
 * @method   assertJson
 * @method   assertJsonStringEqualsJsonString
 * @method   assertJsonStringNotEqualsJsonString
 * @method   assertJsonStringEqualsJsonFile
 * @method   assertJsonStringNotEqualsJsonFile
 * @method   assertJsonFileEqualsJsonFile
 * @method   assertJsonFileNotEqualsJsonFile
 * @method   logicalAnd
 * @method   logicalOr
 * @method   logicalNotlogicalXor
 * @method   anything
 * @method   isTrue
 * @method   callbackisFalse
 * @method   isJson
 * @method   isNull
 * @method   isFinite
 * @method   isInfinite
 * @method   isNan
 * @method   attribute
 * @method   contains
 * @method   containsOnly
 * @method   containsOnlyInstancesOf
 * @method   arrayHasKey
 * @method   equalTo
 * @method   attributeEqualTo
 * @method   isEmpty
 * @method   isWritable
 * @method   isReadable
 * @method   directoryExists
 * @method   fileExists
 * @method   greaterThan
 * @method   greaterThanOrEqual
 * @method   classHasAttribute
 * @method   classHasStaticAttribute
 * @method   objectHasAttribute
 * @method   identicalTo
 * @method   isInstanceOf
 * @method   isType
 * @method   lessThan
 * @method   lessThanOrEqual
 * @method   matchesRegularExpression
 * @method   matches
 * @method   stringStartsWith
 * @method   stringContains
 * @method   stringEndsWith
 * @method   countOf
 * @method   fail
 * @method   readAttribute
 * @method   getStaticAttribute
 * @method   getObjectAttribute
 * @method   markTestIncomplete
 * @method   markTestSkipped
 * @method   getCount
 * @method   resetCount
 */
trait TestTrait
{
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
    public abstract function __call(string $methodName, array $arguments);

    /**
     * Create empty instance
     *
     * Create and return a new empty instance of the tested class
     *
     * @return object
     */
    protected abstract function createEmptyInstance();

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
    protected abstract function setValue($instance, string $property, $value);

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
    protected abstract function getValue($instance, string $property);

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
    protected abstract function getPropertyReflection(
        string $instanceClassName,
        string $property
    ) : \ReflectionProperty;

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
    protected abstract function createPropertyReflection(
        string $instanceClassName,
        string $property
    ) : ?\ReflectionProperty;

    /**
     * Get tested instance
     *
     * Return the tested instance name
     *
     * @return string
     */
    protected abstract function getTestedInstance() : string;

    /**
     * Get TestCase
     *
     * Return the current TestCase
     *
     * @return TestCase
     */
    protected abstract function getTestCase() : TestCase;
}
