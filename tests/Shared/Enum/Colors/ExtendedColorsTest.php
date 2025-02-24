<?php declare(strict_types=1);

namespace Tests\Shared\Enum\Colors;

use Arm\Enums\Shared\Colors\ExtendedColors;

use Tests\TestCase;

class ExtendedColorsTest extends TestCase {
    public function testCanBeInstantiated() {
        $this->assertInstanceOf(ExtendedColors::class, ExtendedColors::RED());
    }
    public function testCanBeInstantiatedFromValue() {
        $this->assertInstanceOf(ExtendedColors::class, new ExtendedColors('Azul'));
    }
    public function testCanBeInstantiatedFromClassConstant() {
        $this->assertInstanceOf(ExtendedColors::class, new ExtendedColors(ExtendedColors::GREEN()));
    }
    public function testCanBeEqual() {
        $this->assertTrue(ExtendedColors::RED()->equals(new ExtendedColors(ExtendedColors::RED())));
    }
    public function testCanBeNotEqual() {
        $this->assertFalse(ExtendedColors::RED()->equals(new ExtendedColors(ExtendedColors::GREEN())));
    }
    public function testCanResetValues() {
        $color = ExtendedColors::RED();
        $color->reset();
        $this->assertNull($color->get());
    }
}