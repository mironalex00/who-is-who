<?php declare(strict_types=1);

namespace Tests\Game\Questions;

use Arm\Interfaces\Game\Answers\IAnswer;
use Arm\Interfaces\Game\Questions\IQuestion;
use Arm\Interfaces\Game\Questions\IQuestions;
use Tests\Game\Questions\Traits\QuestionsTrait;

use Tests\TestCase;

class QuestionsTest extends TestCase {
    use QuestionsTrait;
    public static function setUpBeforeClass(): void {
        self::setUpQuestionsBeforeClass();
    }
    public function testQuestionsAreInstanciated() {
        $this->assertInstanceOf(IQuestions::class, self::$questions);
    }
    public function testCanGetQuestions() {
        $this->assertNotNull(self::$questions);
    }
    public function testQuestionsHasAtLeastOneAnswer() {
        $this->assertNotFalse(self::$questions->get(0));
    }
    public function testQustionsHasAnswers() {
        $results = 0;
        self::$questions->filter(function(IQuestion $question) use (&$results) {
            $response = $question->getAnswers()->filter(fn(IAnswer $answer) => $answer->isCorrect() );
            if($response !== false) $results++;
        });
        $this->assertEquals(self::$questions->count(), $results);
    }
}