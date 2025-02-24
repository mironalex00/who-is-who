<?php declare(strict_types=1);

namespace Tests\Shared\Enum\Colors;

use Arm\Enums\Shared\Colors\Colors;

use Tests\TestCase;

class ColorsTest extends TestCase {
    public function testCanBeInstantiated() {
        $this->assertInstanceOf(Colors::class, Colors::RED());
    }
    public function testCanBeInstantiatedFromValue() {
        $this->assertInstanceOf(Colors::class, new Colors('Azul'));
    }
    public function testCanBeInstantiatedFromClassConstant() {
        $this->assertInstanceOf(Colors::class, new Colors(Colors::GREEN()));
    }
    public function testCanBeEqual() {
        $this->assertTrue(Colors::RED()->equals(new Colors(Colors::RED())));
    }
    public function testCanBeNotEqual() {
        $this->assertFalse(Colors::RED()->equals(new Colors(Colors::GREEN())));
    }
    public function testCanResetValues() {
        $color = Colors::RED();
        $color->reset();
        $this->assertNull($color->get());
    }
}