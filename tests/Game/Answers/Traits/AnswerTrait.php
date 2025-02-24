<?php declare(strict_types=1);

namespace Tests\Game\Answers\Traits;

use Arm\Game\Answers\Answer;

use function array_map;

trait AnswerTrait {
    protected static Answer $answer;
    protected static String $defaultAnswer = 'test_1';
    public static function setUpAnswerBeforeClass(): void {
        self::setUpPlayerBeforeClass();
        self::$answer = new Answer( self::$defaultAnswer );
    }
    public static function getMultipleAnswers(bool|int|float|string ...$answers): array {
        return array_map(
            fn(bool|int|float|string $answer) => new Answer($answer), 
            [self::$defaultAnswer, ...$answers]
        );
    }
}