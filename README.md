# Beotie/lib_test

This library is used by Beotie project as base wrapper for some features. The first objective is to be abble to create tests in traits, rather than test case directly.

## Implementing

This library come with two traits, so it is enough to use these traits into your tests.

```php
class MyTestCase extends TestCase
{
    use Beotie\LibTest\Traits\TestCaseTrait,
        MyFeatureTest;
        
    protected function getTestedInstance() : string
    {
        return MyAwesomeClass::class;
    }
}

trait MyFeatureTest
{
    use Beotie\LibTest\Traits\TestTrait;
    
    public function myTest()
    {
        $this->getTestCase()->assertTrue(true);
    }
}
```

The `Beotie\LibTest\Traits\TestCaseTrait` implement a `getTestCase()` method that return the current `TestCase` instance. It's needed to implement the `getTestedInstance()` method in order to be able to use the `Beotie\LibTest\Traits\TestTrait` as it define it abstract.

## The `TestTrait` methods

### createEmptyInstance

In order to make unit testing with full abstraction, the `TestTrait` offer a `createEmptyInstance()` method that return a new instance of defined tested instance without calling constructor.

```php
trait MyFeatureTest
{
    use Beotie\LibTest\Traits\TestTrait;
    
    public function myTest()
    {
        $instanceToTest = $this->createEmptyInstance();
        $this->getTestCase()->assertTrue($instanceToTest->isEmpty());
    }
}
```

### Property getter and setter

The `Beotie\LibTest\Traits\TestTrait` allow you to automatically extract and inject values into instance properties. It will follow the inheritance tree in order to find the property location if it is not hosted directly in the tested class and make it accessible if protected or private.

```php
trait MyFeatureTest
{
    use Beotie\LibTest\Traits\TestTrait;
    
    public function myTest()
    {
        $instanceToTest = $this->createEmptyInstance();
        $this->setValue($instance, 'propertyName', 'valueToInject');
        $this->getTestCase()->assertFalse($instanceToTest->isEmpty());
        
        $instanceToTest->setPropertyName('otherValue');
        $this->getTestCase()->assertEquals('otherValue', $this->getValue($instance, 'propertyName'));
    }
}
```

### TestCase wrapping

The `Beotie\LibTest\Traits\TestTrait` forward method invocation to the stored TestCase, so it's possible to directly call the `TestCase` methods inside the `TestTrait`.

```php
trait MyFeatureTest
{
    use Beotie\LibTest\Traits\TestTrait;
    
    public function myTest()
    {
        $instanceToTest = $this->createEmptyInstance();
        $this->setValue($instance, 'propertyName', 'valueToInject');
        $this->assertFalse($instanceToTest->isEmpty());
        
        $instanceToTest->setPropertyName('otherValue');
        $this->assertEquals('otherValue', $this->getValue($instance, 'propertyName'));
    }
}
```
