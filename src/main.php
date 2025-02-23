<?php declare(strict_types=1);

require_once (__DIR__ . '/../vendor/autoload.php');

use Arm\Enums\Shared\Gender;
use Arm\Game\Player\Player;
use Ramsey\Uuid\Rfc4122\UuidV8;

var_dump(
    Gender::OTHER,
    new Player(
        UuidV8::uuid7()->toString(),
        'name',
        new DateTime('2000-01-01'),
        Gender::MALE
    )
);  

exit()

?>