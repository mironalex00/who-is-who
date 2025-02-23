<?php declare(strict_types=1);

namespace Arm\Game\Player;

use Arm\Enums\Shared\Gender;
use Arm\Interfaces\Game\Players\IPlayer;
use Arm\Shared\Value;

use Ramsey\Uuid\Rfc4122\UuidV8;

use DateTime;
use InvalidArgumentException;

class Player extends Value implements IPlayer {
    public function __construct(
        protected string $uuid,
        protected string $name,
        protected DateTime $birthDate,
        protected Gender $gender
    ) {
        if(!UuidV8::getFactory()->getValidator()->validate($this->uuid))
            throw new InvalidArgumentException('Invalid uuid');
    }
    public function getName(): String {
        return $this->name;
    }
    public function getBirthDate(): String {
        return $this->birthDate->format('d-m-Y');
    }
    public function getAge(): int { 
        return  $this->birthDate->diff(new DateTime())->y;
    }
    public function getGender(): String {  return $this->gender->value;  }
    public function reset(): void { 
        unset($this->name);
        unset($this->birthDate);
        unset($this->gender);
    }
}