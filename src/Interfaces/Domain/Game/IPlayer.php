<?php declare(strict_types=1);
#region Namespace
namespace Arm\Game\Contracts;
#endregion

#region Contract imports
use Arm\Contracts\Shared\IValue;
use Arm\Game\Contracts\ICharacter;
#endregion

interface IPlayer extends IValue {
    #region Methods
    public function getName(): String;
    public function getBirthDate(): String;
    public function getAge();
    public function getCharacter(): ICharacter;
    #endregion
}