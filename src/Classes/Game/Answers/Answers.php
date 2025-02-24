<?php declare(strict_types=1);

namespace Arm\Game\Answers;

use Arm\Interfaces\Game\Answers\IAnswer;
use Arm\Interfaces\Game\Answers\IAnswers;
use Arm\Shared\Value;

use ArrayObject;

use function is_null;
use function is_bool;

final class Answers extends Value implements IAnswers {
	private ArrayObject $answers;
	final public function __construct( 
        IAnswer ...$answers
    ){
		$this->answers = new ArrayObject($answers);
	}
    public function add(IAnswer $value): void {
        $this->answers->append($value);
    }
    public function filter( callable $callback ): IAnswer|false {
        for($i = 0; $i < $this->answers->count(); $i++) {
            $answer = $this->answers->offsetGet($i);
            $result = $callback($answer);
            if(!is_null($result))
                if(is_bool($result))
                    if(!(!$result))
                        return $answer;
        }
        return false;
    }
    public function get(int $index) : IAnswer|false {
        if($this->answers->offsetExists($index)) 
            return $this->answers->offsetGet($index);
        return false;
    }
    public function remove( Int $index ): void {
        $this->answers->offsetUnset($index);
    }
    public function update( int $index, IAnswer $value ): void {
        $this->answers->offsetSet($index, $value);
    }
    public function reset(): void {
        $this->answers->exchangeArray([]);
    }
    public function count(): int {
        return $this->answers->count();
    }
}