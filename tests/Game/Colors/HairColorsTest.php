<?php declare(strict_types=1);

namespace Tests\Game\Colors;

use Arm\Enums\Game\Colors\HairColors;

use Tests\TestCase;

class HairColorsTest extends TestCase {
    public function testCanBeInstantiated() {
        $this->assertInstanceOf(HairColors::class, HairColors::RED());
    }
    public function testCanBeInstantiatedFromValue() {
        $this->assertInstanceOf(HairColors::class, new HairColors('Azul'));
    }
    public function testCanBeInstantiatedFromClassConstant() {
        $this->assertInstanceOf(HairColors::class, new HairColors(HairColors::GREEN()));
    }
    public function testCanBeEqual() {
        $this->assertTrue(HairColors::RED()->equals(new HairColors(HairColors::RED())));
    }
    public function testCanBeNotEqual() {
        $this->assertFalse(HairColors::RED()->equals(new HairColors(HairColors::GREEN())));
    }
    public function testCanResetValues() {
        $color = HairColors::RED();
        $color->reset();
        $this->assertNull($color->get());
    }
}