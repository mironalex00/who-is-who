<?php declare(strict_types=1);

namespace Arm\Interfaces\Game\Answers;

use Arm\Interfaces\Shared\IValue;

interface IAnswers extends IValue {
    public function add(IAnswer $value): void;
    public function get(int $index) : IAnswer|false;
    public function remove( Int $index ): void;
    public function update( int $index, IAnswer $value ): void;
    public function filter( callable $callback ): IAnswer|false;
    public function count(): int;
}