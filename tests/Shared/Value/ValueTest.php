<?php declare(strict_types=1);

namespace Tests\Shared\Value;

use Tests\Shared\Value\Examples\BaseValueClass;
use Tests\Shared\Value\Examples\ReadonlyValueClass;

use Tests\TestCase;

class ValueTest extends TestCase {
    public function testCanBeEqualWithSameClass() {
        $base = new BaseValueClass('test');
        $this->assertTrue($base->equals(new BaseValueClass('test')));
    }
    public function testCanNotBeEqualWithSameClass() {
        $base = new BaseValueClass('test');
        $this->assertFalse($base->equals(new BaseValueClass('test2')));
    }
    public function testCanNotBeEqualWithDifferentClass() {
        $base = new BaseValueClass('test');
        $diff = new ReadonlyValueClass('test');
        $this->assertFalse($base->equals($diff));
    }
}