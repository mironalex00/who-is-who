<?php declare(strict_types=1);
      use Arm\Game\Entities\Answer;
      use Arm\Game\Entities\Question;
#define('MAX_PLAYERS', 2);
#define('MAX_PLAYER_ATTEMPTS', 1);

require_once(__DIR__ . '/../vendor/autoload.php');

$answer = new Answer('Test');
$answer2 = new Answer('Bar', true);

$question = new Question('¿Foo?', $answer);

$question->addAnswer($answer2);

var_dump($question);

?>