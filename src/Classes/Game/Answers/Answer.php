<?php declare(strict_types=1);
namespace Arm\Game\Answers;

use Arm\Interfaces\Game\Answers\IAnswer;
use Arm\Shared\Value;

final class Answer extends Value implements IAnswer {
    public function __construct(private Bool|Int|Float|String $answer) {}
    public function getAnswer(): Bool|Int|Float|String {    return  $this->answer;   }
}