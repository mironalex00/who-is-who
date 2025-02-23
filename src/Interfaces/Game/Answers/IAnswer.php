<?php declare(strict_types=1);

namespace Arm\Interfaces\Game\Answers;

interface IAnswer {
    public function getAnswer(): Bool|Int|Float|String;
}