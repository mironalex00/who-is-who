<?php declare(strict_types=1);

#region Namespace
namespace App\Shared;
#endregion

#region ORM Definitions
use App\Shared\Traits\DoctrineTraits;
use Doctrine\ORM\Mapping\MappedSuperclass;
#endregion
#region Game Objects
use App\Contracts\Shared\IValue;
#endregion
#region PHP Functions
use function basename;
#endregion
#region PHP Classes
use ReflectionClass;
use ReflectionObject;
#endregion

#[MappedSuperclass]
abstract class Value implements IValue {
    #region Fields
    use DoctrineTraits;
    #endregion
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
            if($prop->isInitialized($this)){
                $value1 = $prop->getValue($this);
                $value2 = $prop->getValue($val);
                if ($value1 !== $value2)
                    return false;
            }
        }
        return true;
	}
    public function reset(): void {
        foreach ((new ReflectionObject($this))->getProperties() as $property) {
            $property->setAccessible(true);
            if(!$property->isReadOnly() && !$property->isStatic()){
                unset($this->{$property->getName()});
            }
        }
    }
    public static function getClassName(): string { return basename(static::class); }
    #endregion
    #region String methods
    public function toString(): string { return $this->__toString(); }
    public function __toString(): string { return json_encode($this); }
    #endregion
}