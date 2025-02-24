<?php declare(strict_types=1);

namespace Tests\Game\Player;

use Arm\Game\Characters\Character;
use Tests\Game\Character\Traits\CharacterTrait;

use Tests\TestCase;

class CharacterTest extends TestCase {
    use CharacterTrait;
    public static function setUpBeforeClass(): void {
        self::setUpCharacterBeforeClass();
    }
    #region Character values
    public function testCanGetInstanciated() {
        $this->assertInstanceOf(Character::class, self::$character);
    }
    public function testCanGetCharacterName() {
        $this->assertEquals(self::$charName, self::$character->name);
    }
    public function testCanGetCharacterImg() {
        $this->assertEquals(self::$charImg, self::$character->urlImg);
    }
    public function testCanGetCharacterGender() {
        $this->assertEquals(self::$charGender, self::$character->gender);
    }
    public function testCanGetCharacterEyeColor() {
        $this->assertEquals(self::$charEyeColor, self::$character->eyeColor);
    }
    public function testCanGetCharacterHairColor() {
        $this->assertEquals(self::$charHairColor, self::$character->hairColor);
    }
    public function testCanGetCharacterProfession() {
        $this->assertEquals(self::$charProfession, self::$character->profession);
    }
    public function testCanGetCharacterBirthDate() {
        $this->assertEquals(self::$charBDay, self::$character->birthDate);
    }
    public function testCanGetCharacterHeight() {
        $this->assertEquals(self::$charHeight, self::$character->heightCM);
    }
    public function testCanGetCharacterAlive() {
        $this->assertEquals(self::$charAlive, self::$character->isAlive);
    }
    public function testCanGetCharacterNationality() {
        $this->assertEquals(self::$charNationality, self::$character->nationality);
    }
    public function testCanGetCharacterCurrentLocation() {
        $this->assertEquals(self::$charCurrentLocation, self::$character->currentLocation);
    }
    #endregion
    public function testCharacterHasQuestions() {
        $this->assertGreaterThanOrEqual(self::$questions->count(), self::$character->questions->count());
    }
    public function testCharacterHasFirstQuestionAnswer() {
        $this->assertGreaterThanOrEqual(1, self::$character->questions->get(0)->getAnswers()->count());
    }
    public function testCharacterHasFirstQuestionCorrectAnswer() {
        $this->assertTrue(self::$character->questions->get(0)->validate(self::$answer));
    }
    public function testCanGetCharacterAnswer() {
        $this->assertEquals(self::$answer, self::$character->questions->get(0)->getAnswers()->get(0));
    }
}