<?php declare(strict_types=1);

namespace Arm\Interfaces\Shared;

use JsonSerializable;
use Stringable;

interface IEnum extends IValue, JsonSerializable, Stringable {
    public function get(): bool|int|float|string|IEnum;
    public function jsonSerialize(): mixed;
}