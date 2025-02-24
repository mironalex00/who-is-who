<?php declare(strict_types=1);

namespace Arm\Interfaces\Game\Questions;

use Arm\Interfaces\Game\Answers\IAnswer;
use Arm\Interfaces\Game\Answers\IAnswers;
use Arm\Interfaces\Shared\IValue;

interface IQuestion extends IValue {
    public function getQuestion(): String;
    public function getAnswers(): IAnswers;
    public function validate(IAnswer $aswer): bool;
}