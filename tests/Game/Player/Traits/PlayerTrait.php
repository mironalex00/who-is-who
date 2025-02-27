<?php declare(strict_types=1);

namespace Tests\Game\Player\Traits;

use Arm\Enums\Shared\Gender;
use Arm\Game\Player\Player;

use DateTime;
use Ramsey\Uuid\Rfc4122\UuidV8;
use Tests\Game\Character\Traits\CharacterTrait;

trait PlayerTrait {
    use CharacterTrait;
    protected static Player $player;
    protected static string $name = 'Test Player';
    protected static string $birthDate = '01-01-2000';
    protected static DateTime $birthDateDT;
    public static function setUpPlayerBeforeClass(): void {
        self::setUpCharacterBeforeClass();
        self::$birthDateDT = new DateTime(self::$birthDate);
        self::$player = new Player(
            UuidV8::uuid7()->toString(),
            self::$name,
            self::$birthDateDT,
            Gender::MALE,
            self::$character
        );
        // parent::setUpBeforeClass();
    }
}