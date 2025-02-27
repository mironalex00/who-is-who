<?php declare(strict_types= 1);

#region Namespace
namespace Arm\Game\Contracts;
#endregion

#region Doctrine Class Annotations
use Doctrine\Common\Collections\Collection;
#endregion
#region Contract imports
use Arm\Contracts\Shared\IValue;
#endregion

interface ICharacter extends IValue{
    #region Methods
    public function getQuestions(): Collection;
    #endregion
}