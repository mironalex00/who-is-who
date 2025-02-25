<?php declare(strict_types=1);

namespace Tests\Game\Player;

use Arm\Enums\Shared\Gender;
use Arm\Game\Player\Player;
use Arm\Interfaces\Game\Players\IPlayer;
use Tests\Game\Player\Traits\PlayerTrait;

use InvalidArgumentException;
use DateTime;

use Tests\TestCase;

class PlayerTest extends TestCase {
    use PlayerTrait;
    public static function setUpBeforeClass(): void {
        self::setUpPlayerBeforeClass();
    }
    public function testCanBeInstantiated() {
        $this->assertInstanceOf(IPlayer::class, self::$player);
    }
    public function testCanNotBeInstantiatedWithInvalidUuid() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid uuid');
        new Player(
            'uuid', 
            self::$name, 
            self::$birthDateDT, 
            Gender::MALE, 
            self::$character
        );
    }
    public function testCanGetName() {
        $this->assertEquals(self::$name, self::$player->getName());
    }
    public function testCanGetBirthDate() {
        $this->assertEquals(self::$birthDate, self::$player->getBirthDate());
    }
    public function testCanGetAge() {
        $expected = (new DateTime('now'))->diff( self::$birthDateDT )->y;
        $this->assertEquals($expected, self::$player->getAge());
    }
    public function testCanGetGender() {
        $this->assertEquals(Gender::MALE->value, self::$player->getGender());
    }
    public function testCanReset() {
        self::$player->reset();
        $this->assertPropertyUninitialized(self::$player, 'uuid');
        $this->assertPropertyUninitialized(self::$player, 'name');
        $this->assertPropertyUninitialized(self::$player, 'birthDate');
        $this->assertPropertyUninitialized(self::$player, 'gender');
    }
}