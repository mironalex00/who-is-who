<?php declare(strict_types=1);
#   Namespace
namespace Tests;
#   Imports from external libraries
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;
#   Imports from php internal libraries
use ReflectionClass;
use ReflectionProperty;
#   Abstract Test Class
abstract class TestCase extends PHPUnit_TestCase {
    /**
     * @param Object $class
     *     The class to get the property from.
     * @param String $propertyName
     *     The name of the property to get.
     * @return ReflectionProperty The property that was found.
    */
    private function getReflectionProperty(Object $class, String $propertyName): ReflectionProperty {
        $reflection = new ReflectionClass($class);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property;
    }
    /**
     * @param Object $object
     *     The object to get the property from.
     * @param String $propertyName
     *     The name of the property to get.
     * @return Never Asserts that the property is not initialized.
    */
    final protected function assertPropertyUninitialized(Object $object, String $propertyName): void {
        $this->assertFalse(
            $this->getReflectionProperty($object, $propertyName)->isInitialized($object),
            "Property '$propertyName' is initialized."
        );
    }
    /**
     * @param Object $object
     *     The object to get the property from.
     * @param String $propertyName
     *     The name of the property to get.
     * @return Never Asserts that the property is initialized.
    */
    final protected function assertPropertyInitialized(Object $object, String $propertyName): void {
        $this->assertTrue(
            $this->getReflectionProperty($object, $propertyName)->isInitialized($object),
            "Property '$propertyName' is not initialized."
        );
    }
}