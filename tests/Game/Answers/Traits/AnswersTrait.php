<?php declare(strict_types=1);

namespace Tests\Game\Answers\Traits;

use Arm\Game\Answers\Answers;

trait AnswersTrait {
    use AnswerTrait;
    protected static Answers $answers;
    public static function setUpAnswersBeforeClass(): void {
        self::setUpAnswerBeforeClass();
        self::$answers = new Answers(...self::getMultipleAnswers());
    }
}