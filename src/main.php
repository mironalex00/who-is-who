<?php declare(strict_types=1);

require_once (__DIR__ . '/../vendor/autoload.php');

use Arm\Enums\Game\Colors\EyeColors;
use Arm\Enums\Game\Colors\HairColors;
use Arm\Enums\Shared\Gender;
use Arm\Enums\Shared\Profession;
use Arm\Game\Answers\Answer;
use Arm\Game\Answers\Answers;
use Arm\Game\Characters\Character;
use Arm\Game\Player\Player;

use Ramsey\Uuid\Rfc4122\UuidV8;

$player = new Player(
    UuidV8::uuid7()->toString(),
    'name',
    new DateTime('2000-01-01'),
    Gender::MALE
);

$answer = new Answer('test');
$answer2 = new Answer('test2');

$answers = new Answers(
    $player,
    $answer,
    $answer2
); 

$character = new Character(
    'character_one',
    'urlImg',
    Gender::MALE,
    EyeColors::BLUE(),
    HairColors::BLACK(),
    Profession::ACTRESS,
    new DateTime('1999-12-31'),
    180,
    true,
    'Spain',
    'Spain',
    $answers,
);

var_dump($character);

?>