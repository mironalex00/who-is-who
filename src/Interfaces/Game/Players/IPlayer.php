<?php declare(strict_types=1);

namespace Arm\Interfaces\Game\Players;

use Arm\Interfaces\Shared\IValue;

interface IPlayer extends IValue {
    public function getName(): String;
	public function getBirthDate(): String;
	public function getAge();
    public function reset(): void;
}