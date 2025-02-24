<?php declare(strict_types=1);

namespace Tests\Shared\Enum;

use Arm\Enums\Shared\Enum;
use Tests\TestCase;

class TestEnum extends Enum {
    public const FIRST = 1;
    public const SECOND = 2;
};

class EnumTest extends TestCase {
    public function testCanBeInstantiated() {
        $this->assertInstanceOf(Enum::class, TestEnum::FIRST());
    }
    public function testCanBeInstantiatedFromValue() {
        $this->assertInstanceOf(Enum::class, new TestEnum(1));
    }
    public function testCanBeInstantiatedFromClassConstant() {
        $this->assertInstanceOf(Enum::class, new TestEnum(TestEnum::FIRST()));
    }
    public function testCanBeEqual() {
        $this->assertTrue(TestEnum::SECOND()->equals(new TestEnum(TestEnum::SECOND())));
    }
    public function testCanBeNotEqual() {
        $this->assertFalse(TestEnum::FIRST()->equals(new TestEnum(TestEnum::SECOND())));
    }
    public function testCanResetValues() {
        $color = TestEnum::FIRST();
        $color->reset();
        $this->assertNull($color->get());
    }
}