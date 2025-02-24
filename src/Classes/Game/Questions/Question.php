<?php declare(strict_types=1);
namespace Arm\Game\Questions;

use Arm\Interfaces\Game\Answers\IAnswer;
use Arm\Interfaces\Game\Answers\IAnswers;
use Arm\Interfaces\Game\Questions\IQuestion;
use Arm\Shared\Value;

final class Question extends Value implements IQuestion {
    public function __construct(
        private String $question,
        private IAnswers $answers
    ) {}
    public function getQuestion(): string {
        return $this->question;
    }
    public function getAnswers(): IAnswers {
        return $this->answers;
    }
    public function validate(IAnswer $answer): bool {
        $result = $this->answers->filter(function(IAnswer $loopAnswer) use (&$answer) {
            return $loopAnswer->equals($answer);
        });
        return !(!$result);
    }
}