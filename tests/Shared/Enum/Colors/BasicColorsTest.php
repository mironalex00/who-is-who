<?php declare(strict_types=1);

namespace Tests\Shared\Enum\Colors;

use Arm\Enums\Shared\Colors\BasicColors;

use Tests\TestCase;

class BasicColorsTest extends TestCase {
    public function testCanBeInstantiated() {
        $this->assertInstanceOf(BasicColors::class, BasicColors::RED());
    }
    public function testCanBeInstantiatedFromValue() {
        $this->assertInstanceOf(BasicColors::class, new BasicColors('Azul'));
    }
    public function testCanBeInstantiatedFromClassConstant() {
        $this->assertInstanceOf(BasicColors::class, new BasicColors(BasicColors::GREEN()));
    }
    public function testCanBeEqual() {
        $this->assertTrue(BasicColors::RED()->equals(new BasicColors(BasicColors::RED())));
    }
    public function testCanBeNotEqual() {
        $this->assertFalse(BasicColors::RED()->equals(new BasicColors(BasicColors::GREEN())));
    }
    public function testCanResetValues() {
        $color = BasicColors::RED();
        $color->reset();
        $this->assertNull($color->get());
    }
}