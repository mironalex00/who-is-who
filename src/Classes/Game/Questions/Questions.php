<?php declare(strict_types=1);
namespace Arm\Game\Questions;

use Arm\Interfaces\Game\Questions\IQuestion;
use Arm\Interfaces\Game\Questions\IQuestions;
use Arm\Shared\Value;

use ArrayObject;

final class Questions extends Value implements IQuestions {
	private ArrayObject $questions;
	final public function __construct( 
        IQuestion ...$question
    ){
		$this->questions = new ArrayObject($question);
    }
    public function add(IQuestion $value): void {
        $this->questions->append($value);
    }    
    public function filter( callable $callback ): IQuestion|false {
        for($i = 0; $i < $this->questions->count(); $i++) {
            $answer = $this->questions->offsetGet($i);
            $result = $callback($answer);
            if(!is_null($result))
                if(is_bool($result))
                    if(!(!$result))
                        return $answer;
        }
        return false;
    }
    public function get(int $index) : IQuestion|false {
        if($this->questions->offsetExists($index)) 
            return $this->questions->offsetGet($index);
        return false;
    }
    public function remove( Int $index ): void {
        $this->questions->offsetUnset($index);
    }
    public function update( int $index, IQuestion $value ): void {
        $this->questions->offsetSet($index, $value);
    }
    public function reset(): void {
        $this->questions->exchangeArray([]);
    }
    public function count(): int {
        return $this->questions->count();
    }
}