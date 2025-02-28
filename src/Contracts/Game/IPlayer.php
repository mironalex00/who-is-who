<?php declare(strict_types=1);
#region Namespace
namespace App\Contracts\Game;
#endregion

#region Contract imports
use App\Contracts\Shared\IValue;
use App\Contracts\Game\ICharacter;
#endregion

interface IPlayer extends IValue {
    #region Methods
    public function getName(): String;
    public function getBirthDate(): String;
    public function getAge();
    public function getCharacter(): ICharacter;
    #endregion
}