<?php declare(strict_types=1);

namespace Arm\Enums\Shared;

use Arm\Interfaces\Shared\IEnum;
use Arm\Interfaces\Shared\IValue;
use Arm\Shared\Value;

use BadMethodCallException;
use UnexpectedValueException;

use function array_search;
use function array_key_exists;
use function get_class;

abstract class Enum extends Value implements IEnum {
    protected Bool|Int|Float|String $value;
    protected String $key;
    protected static Array $cache = [];
    protected static Array $instances = [];
    #region Constructor
    final public function __construct(Bool|Int|Float|String|IEnum $enumValue) { 
        if ($enumValue instanceof static) {
            $enumValue = $enumValue->get();
        }
        $this->key = static::assertValidValueReturningKey($enumValue);
        $this->value = $enumValue;
    }
    #endregion
    #region Public static methods
    public static function __callStatic(String $name, $arguments): static {
        $class = static::class;
        if (!isset(self::$instances[$class][$name])) {
            $array = static::toArray();
            if (!isset($array[$name]) && !array_key_exists($name, $array)) {
                $message = "No static method or enum constant '$name' in class " . static::class;
                throw new BadMethodCallException($message);
            }
            return self::$instances[$class][$name] = static::createInstance($array[$name]);
        }
        return clone self::$instances[$class][$name];
    }
    #endregion
    #region Public methods
    public function get(): bool|int|float|string|null {
        if(!isset($this->value))
            return null;
        return $this->value;
    }
    public function equals(IValue $val): bool {
        return $val instanceof self
            && $this->get() === $val->get()
            && static::class === get_class($val);
    }
    public function jsonSerialize(): mixed {
        return $this->get();
    }
    #endregion
    #region Private and protected static methods
    private static function assertValidValueReturningKey(Bool|Int|Float|String $value): String  {
        if (false === ($key = static::search($value))) {
            throw new UnexpectedValueException("Value '$value' is not part of the enum " . static::class);
        }
        return $key;
    }
    protected static function search(Bool|Int|Float|String $value): String|int|false {
        return array_search($value, static::toArray(), true);
    }
    protected static function toArray(): Array {
        $class = static::class;
        if (!isset(self::$cache[$class])) {
            $reflection = new \ReflectionClass($class);
            self::$cache[$class] = $reflection->getConstants();
        }
        return self::$cache[$class];
    }
    protected static function createInstance(Bool|Int|Float|String $value): static {
        return new static($value);
    }
    #endregion
    #region Forbidden methods
    public function __toString(): String {
        return (string)$this->value;
    }
    public function __wakeup(): void {
        if ($this->key === null) 
            $this->key = static::search($this->value);
    }
    #endregion
};