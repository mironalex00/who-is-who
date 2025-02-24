<?php declare(strict_types=1);

namespace Arm\Interfaces\Game\Questions;

use Arm\Interfaces\Shared\IValue;

interface IQuestions extends IValue {
    public function add(IQuestion $value): void;
    public function get(int $index) : IQuestion|false;
    public function remove( Int $index ): void;
    public function update( int $index, IQuestion $value ): void;
    public function count(): int;
}