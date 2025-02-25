<?php declare(strict_types=1);

namespace Tests\Game\Answers;

use Arm\Interfaces\Game\Answers\IAnswers;
use Tests\Game\Answers\Traits\AnswersTrait;

use Tests\TestCase;

class AnswersTest extends TestCase {
    use AnswersTrait;
    public static function setUpBeforeClass(): void {
        self::setUpAnswersBeforeClass();
    }
    public function testAnswersAreInstanciated() {
        $this->assertInstanceOf(IAnswers::class, self::$answers);
    }
    public function testCanGetAnswers() {
        $this->assertNotNull(self::$answers);
    }
    public function testAnswersHasAtLeastOneAnswer() {
        $this->assertNotFalse(self::$answers->get(0));
    }
    public function testAnswersEqualsToAnswerWithAssert() {
        $this->assertEquals(self::$answers->get(0), self::$answer);
    }
    public function testAnswersEqualsToAnswerWithEquals() {
        $this->assertTrue(self::$answers->get(0)->equals(self::$answer));
    }
}