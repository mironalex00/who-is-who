<?php declare(strict_types=1);

#region Namespace
namespace App\Contracts\Game;
#endregion

#region Contract imports
use App\Contracts\Shared\IValue;
#endregion

interface IAnswer extends IValue {
    #region Methods
    public function getAnswer(): Bool|Int|Float|String;
    public function isCorrect(): bool;
    #endregion
}