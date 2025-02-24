<?php declare(strict_types=1);

namespace Tests\Game\Questions;

use Arm\Interfaces\Game\Answers\IAnswer;
use Arm\Interfaces\Game\Questions\IQuestion;
use Tests\Game\Questions\Traits\QuestionTrait;
use Tests\TestCase;

class QuestionTest extends TestCase {
    use QuestionTrait;
    public static function setUpBeforeClass(): void {
        self::setUpQuestionBeforeClass();
    }
    public function testQuestionIsInstanciated() {
        $this->assertInstanceOf(IQuestion::class, self::$question);
    }
    public function testQuestionHasQuestion() {
        $this->assertNotEmpty(self::$question->getQuestion());
    }
    public function testQuestionHasAnswers() {
        $this->assertGreaterThanOrEqual(1, self::$question->getAnswers()->count());
    }
    public function testQuestionHasCorrectAnswer() {
        $this->assertNotFalse(self::$question->getAnswers()->filter(fn(IAnswer $answer) => $answer->isCorrect() ));
    }
    public function testQuestionCanValidateCorrectAnswer() {
        $this->assertTrue(self::$question->validate(self::$answer));
    }
}