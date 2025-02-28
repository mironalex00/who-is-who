<?php declare(strict_types=1);
#region Namespace
namespace App\Contracts\Shared;
#endregion

#region PHP Interfaces
use JsonSerializable;
use Stringable;
#endregion

interface IEnum extends IValue, JsonSerializable, Stringable {
    #region Methods
    public function get(): bool|int|float|string|null;
    public function jsonSerialize(): mixed;
    #endregion
}