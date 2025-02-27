<?php declare(strict_types=1);
namespace Arm\Game\Answers;

#region ORM Definitions
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
#endregion
#region Game Objects
use Arm\Interfaces\Game\Answers\IAnswer;
use Arm\Interfaces\Shared\IValue;
use Arm\Shared\Value;
#endregion
#[Entity]
#[Table(name: "Answer")]
final class Answer extends Value implements IAnswer {
    public function __construct(
        #[Column(name: "answer", type: "string")]
        private Bool|Int|Float|String $answer,
        #[Column(name: "is_correct", type: "boolean")] 
        private bool $isCorrect = false
    ) {}
    public function getAnswer(): Bool|Int|Float|String {    return  $this->answer;   }
    public function isCorrect(): bool {    return  $this->isCorrect;   }
    public function equals(IValue $answer): bool {
        if ($answer instanceof IAnswer) {
            if($this->isCorrect())
                return $this->getAnswer() === $answer->getAnswer();
        }
        return false;
    }
}