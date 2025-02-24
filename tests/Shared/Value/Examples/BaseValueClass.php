<?php

namespace Tests\Shared\Value\Examples;

use Arm\Shared\Value;

class BaseValueClass extends Value {
    public function __construct(protected String $input) {}
}