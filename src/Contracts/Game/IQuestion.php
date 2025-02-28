<?php declare(strict_types=1);

#region Namespace
namespace App\Contracts\Game;
#endregion
#region Contract imports
use App\Contracts\Game\IAnswer;
use App\Contracts\Shared\IValue;
#endregion

interface IQuestion extends IValue {
    #region Methods
    public function getQuestion(): String;
    public function validate(IAnswer $aswer): bool;
    #endregion
}