<?php declare(strict_types=1);

namespace Arm\Interfaces\Shared;

interface IValue {
    public function equals(IValue $val): bool;
    public function reset(): void;
}