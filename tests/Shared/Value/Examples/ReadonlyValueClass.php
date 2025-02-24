<?php

namespace Tests\Shared\Value\Examples;

class ReadonlyValueClass extends BaseValueClass {
    public function __construct( String $input, public readonly String $output = 'test_output' ) {
        parent::__construct($input);
    }
}