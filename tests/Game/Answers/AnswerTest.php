<?php declare(strict_types=1);

namespace Tests\Game\Answers;

use Tests\Game\Answers\Traits\AnswerTrait;
use Tests\Game\Player\Traits\PlayerTrait;

use Tests\TestCase;

class AnswerTest extends TestCase {
    use PlayerTrait;
    use AnswerTrait;
    public static function setUpBeforeClass(): void {
        self::setUpAnswerBeforeClass();
    }
    public function testCanGetName() {
        $this->assertNotNull(self::$answer->getAnswer());
    }
    public function testCanAssertDefaultAnswerValueEqualsAnswerValue() {
        $this->assertEquals(self::$defaultAnswer, self::$answer->getAnswer());
    }
}