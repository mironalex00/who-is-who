<?php declare(strict_types=1);
#region Namespace
namespace App\Contracts\Shared;
#endregion

interface IValue {
    #region Methods
    public function equals(IValue $val): bool;
    public function reset(): void;
    public function toString(): string;
    #endregion
}