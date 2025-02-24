<?php declare(strict_types=1);
namespace Arm\Interfaces\Game\Answers;

use Arm\Interfaces\Shared\IValue;

interface IAnswer extends IValue {
    public function getAnswer(): Bool|Int|Float|String;
}