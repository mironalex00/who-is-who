<?php declare(strict_types=1);
#define('MAX_PLAYERS', 2);
#define('MAX_PLAYER_ATTEMPTS', 1);
require_once(__DIR__ . '/../vendor/autoload.php');

class TestClass {
    use Tests\Game\Player\Traits\PlayerTrait;
    public function __construct() {
        self::setUpPlayerBeforeClass();
    }
    public function getPlayer(): Arm\Game\Player\Player {
        return self::$player;
    }
}

$test = new TestClass(); 
// $test->getPlayer()->updateTimestamps();

?>