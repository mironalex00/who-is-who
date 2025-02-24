<?php declare(strict_types=1);

namespace Tests\Game\Questions\Traits;

use Arm\Game\Answers\Answers;
use Arm\Game\Questions\Question;
use Tests\Game\Answers\Traits\AnswersTrait;

trait QuestionTrait {
    use AnswersTrait;
    protected static Question $question;
    public static function setUpQuestionBeforeClass(): void {
        self::setUpAnswersBeforeClass();
        self::$question = new Question('¿Test?', new Answers(...self::getMultipleAnswers('foo', 'bar')));
    }
}