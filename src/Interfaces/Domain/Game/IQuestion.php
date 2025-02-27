<?php declare(strict_types=1);

#region Namespace
namespace Arm\Game\Contracts;
#endregion
#region Contract imports
use Arm\Game\Contracts\IAnswer;
use Arm\Contracts\Shared\IValue;
#endregion

interface IQuestion extends IValue {
    #region Methods
    public function getQuestion(): String;
    public function validate(IAnswer $aswer): bool;
    #endregion
}