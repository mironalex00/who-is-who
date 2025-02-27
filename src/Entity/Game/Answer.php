<?php declare(strict_types=1);

#region Namespace
namespace Arm\Game\Entities;
#endregion

#region ORM Definitions
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
#endregion
#region Game Objects
use Arm\Contracts\Shared\IValue;
use Arm\Game\Contracts\IAnswer;
use Arm\Shared\Value;
#endregion

#[Entity]
#[Table(name: "answer")]
final class Answer extends Value implements IAnswer {
    #region Properties
    #[Column(type: Types::INTEGER)]
    private int $id;
    #endregion
    #region Constructor
    public function __construct(
        #[Column(name: "answer", type: "string")]
        private Bool|Int|Float|String $answer,
        #[Column(name: "is_correct", type: "boolean")] 
        private bool $isCorrect = false
    ) {}
    #endregion
    #region Answer Methods
    public function getAnswer(): Bool|Int|Float|String {    return  $this->answer;   }
    public function isCorrect(): bool {    return  $this->isCorrect;   }
    #endregion
    #region Validations
    public function equals(IValue $answer): bool {
        if ($answer instanceof IAnswer) {
            if($this->isCorrect())
                return $this->getAnswer() === $answer->getAnswer();
        }
        return false;
    }
    #endregion
}