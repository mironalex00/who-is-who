<?php declare(strict_types=1);

namespace Tests\Game\Character\Traits;

use Arm\Enums\Game\Colors\EyeColors;
use Arm\Enums\Game\Colors\HairColors;
use Arm\Enums\Shared\Gender;
use Arm\Enums\Shared\Profession;
use Arm\Game\Characters\Character;
use Tests\Game\Answers\Traits\AnswersTrait;

use DateTime;

trait CharacterTrait {
    use AnswersTrait;
    private static Character $character;
    private static string $charName = 'Test Character';
    private static string $charImg = 'https://randomuser.me/api/portraits/men/1.jpg';
    private static Gender $charGender = Gender::MALE;
    private static Profession $charProfession = Profession::ACTRESS;
    private static EyeColors $charEyeColor;
    private static HairColors $charHairColor;
    private static DateTime $charBDay;
    private static int $charHeight = 180;
    private static bool $charAlive = true;
    private static String $charNationality = 'Spain';
    private static String $charCurrentLocation = 'Spain';
    public static function setUpCharacterBeforeClass(): void {
        self::setUpAnswersBeforeClass();
        self::$charEyeColor = EyeColors::BLUE();
        self::$charHairColor = HairColors::BLACK();
        self::$charBDay = new DateTime('1999-12-31');
        self::$character = new Character(
            self::$charName,
            self::$charImg,
            self::$charGender,
            self::$charEyeColor,   // EyeColors::BLUE() 
            self::$charHairColor, // HairColors::BLACK(),
            self::$charProfession,
            self::$charBDay,
            self::$charHeight,
            self::$charAlive,
            self::$charNationality,
            self::$charCurrentLocation,
            self::$answers,
        );
    }
}