<?php declare(strict_types=1);
namespace Arm\Game\Answers;

use Arm\Interfaces\Game\Answers\IAnswer;
use Arm\Interfaces\Shared\IValue;
use Arm\Shared\Value;

final class Answer extends Value implements IAnswer {
    public function __construct(private Bool|Int|Float|String $answer, private bool $isCorrect = false) {}
    public function getAnswer(): Bool|Int|Float|String {    return  $this->answer;   }
    public function isCorrect(): bool {    return  $this->isCorrect;   }
    public function equals(IValue $answer): bool {
        if ($answer instanceof IAnswer) {
            if($this->isCorrect()){
                return $this->getAnswer() === $answer->getAnswer();
            }
        }
        return false;
    }
}