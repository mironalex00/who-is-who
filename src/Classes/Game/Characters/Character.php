<?php declare(strict_types=1);

namespace Arm\Game\Characters;

use Arm\Enums\Game\Colors\EyeColors;
use Arm\Enums\Game\Colors\HairColors;
use Arm\Enums\Shared\Gender;
use Arm\Enums\Shared\Profession;
use Arm\Interfaces\Game\Questions\IQuestions;
use Arm\Shared\Value;

use DateTime;

class Character extends Value {
    public function __construct( 
        public readonly string $name,
        public readonly string $urlImg,
        public readonly Gender $gender,
        public readonly EyeColors $eyeColor,
        public readonly HairColors $hairColor,
        public readonly Profession $profession,
        public readonly DateTime $birthDate,
        public readonly int $heightCM,
        public readonly bool $isAlive,
        public readonly string $nationality,
        public readonly string $currentLocation,
        public readonly IQuestions $questions,
    ) {}
    public function __toString(): string {
        return json_encode($this);
    }
}