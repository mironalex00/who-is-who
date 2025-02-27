<?php declare(strict_types=1);

namespace Arm\Game\Player;

#region ORM Definitions
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
#endregion
#region Game Objects
use Arm\Enums\Shared\Gender;
use Arm\Game\Characters\Character;
use Arm\Interfaces\Game\Players\IPlayer;
use Arm\Shared\Value;
#region External libraries
use Ramsey\Uuid\Rfc4122\UuidV8;
#endregion
#region PHP Classes
use DateTime;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\GeneratedValue;
use InvalidArgumentException;
#endregion
#[Entity]
#[Table(name: "player")]
class Player extends Value implements IPlayer {
    #[Id]
    #[Column(type: "guid")]
    #[GeneratedValue(strategy: "CUSTOM")] 
    #[CustomIdGenerator(class: "Ramsey\Uuid\Doctrine\UuidGenerator")]
    protected int|string $id;
    public function __construct(
        string $id,
        #[Column(type: "string", length: 50)]
        protected string $name,
        #[Column(type: "datetime")]
        protected DateTime $birthDate,
        protected Gender $gender,
        public readonly Character $character
    ) {
        $this->id = $id;
        if(!UuidV8::getFactory()->getValidator()->validate($this->id))
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
}