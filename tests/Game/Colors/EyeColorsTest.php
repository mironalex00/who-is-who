<?php declare(strict_types=1);

namespace Tests\Game\Colors;

use Arm\Enums\Game\Colors\EyeColors;

use Tests\TestCase;

class EyeColorsTest extends TestCase {
    public function testCanBeInstantiated() {
        $this->assertInstanceOf(EyeColors::class, EyeColors::RED());
    }
    public function testCanBeInstantiatedFromValue() {
        $this->assertInstanceOf(EyeColors::class, new EyeColors('Azul'));
    }
    public function testCanBeInstantiatedFromClassConstant() {
        $this->assertInstanceOf(EyeColors::class, new EyeColors(EyeColors::GREEN()));
    }
    public function testCanBeEqual() {
        $this->assertTrue(EyeColors::RED()->equals(new EyeColors(EyeColors::RED())));
    }
    public function testCanBeNotEqual() {
        $this->assertFalse(EyeColors::RED()->equals(new EyeColors(EyeColors::GREEN())));
    }
    public function testCanResetValues() {
        $color = EyeColors::RED();
        $color->reset();
        $this->assertNull($color->get());
    }
}