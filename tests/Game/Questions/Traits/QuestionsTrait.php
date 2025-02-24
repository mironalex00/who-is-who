<?php declare(strict_types=1);

namespace Tests\Game\Questions\Traits;

use Arm\Game\Answers\Answer;
use Arm\Game\Answers\Answers;
use Arm\Game\Questions\Question;
use Arm\Game\Questions\Questions;

trait QuestionsTrait {
    use QuestionTrait;
    protected static Questions $questions;
    public static function setUpQuestionsBeforeClass(): void {
        self::setUpQuestionBeforeClass();
        self::$questions = new Questions(self::$player, self::$question);
        self::$questions->add(
            new Question(
                "¿Foo?",
                new Answers(
                    new Answer('foo', false),
                    new Answer('bar', true),
                    new Answer('baz', false),
                    new Answer('qux', false)
                )
            )
        );
    }
}