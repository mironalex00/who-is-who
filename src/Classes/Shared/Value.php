<?php declare(strict_types=1);

namespace Arm\Shared;

use Arm\Interfaces\Shared\IValue;
use ReflectionClass;

abstract class Value implements IValue {
    #region Methods
	public function equals(IValue $val): bool {
        #   Same object, same instance of same class and same value
        if ($this === $val) 
            return true;
        if ($val === null || get_class($this) !== get_class($val))
            return false;
        if (!$val instanceof self)
            return false;
        #   Reflection
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties();
        #   Loop through properties and compare
        foreach ($properties as $prop) {
            $prop->setAccessible(true); 
            $value1 = $prop->getValue($this);
            $value2 = $prop->getValue($val);
            if ($value1 !== $value2)
                return false;
        }
        return true;
	}
    #endregion
}