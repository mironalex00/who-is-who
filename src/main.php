<?php declare(strict_types=1);
/*
define('MAX_PLAYERS', 2);
define('MAX_PLAYER_ATTEMPTS', 1);

require_once (__DIR__ . '/../vendor/autoload.php');

use Arm\Enums\Shared\Gender;
use Arm\Game\Answers\Answer;
use Arm\Game\Answers\Answers;
use Arm\Game\Questions\Question;
use Arm\Game\Player\Player;
use Arm\Game\Questions\Questions;
use Ramsey\Uuid\Rfc4122\UuidV8;
$player = new Player(
    UuidV8::uuid7()->toString(),
    'Player 1',
    new DateTime('01-01-2000'),
    Gender::MALE
);

$question = new Question('¿test?', new Answers(
    new Answer('test'),
    new Answer('test2', true)
));
$question2 = new Question('Foo?', new Answers(
    new Answer('bar', true),
    new Answer('foo')
));

$questions = new Questions(
   $player,
   $question,
   $question2
);

var_dump( $question->validate(new Answer('test2')) );
var_dump( $question2->validate(new Answer('bar')) );

var_dump($questions->player);

exit();
*/
?>