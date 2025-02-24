<?php declare(strict_types=1);

namespace Tests\Game\Answers\Traits;

use Arm\Game\Answers\Answer;

use function array_map;

trait AnswerTrait {
    protected static Answer $answer;
    protected static String $defaultAnswer = 'test_1';
    public static function setUpAnswerBeforeClass(): void {
        self::setUpPlayerBeforeClass();
        self::$answer = new Answer( self::$defaultAnswer, true );
    }
    public static function getMultipleAnswers(bool|int|float|string ...$answer): array {
        $answers = array_map(function ($answer) { return new Answer($answer); }, $answer);
        return [self::$answer, ...$answers];
    }
}