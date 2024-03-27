<?php

namespace App\DataFixtures;

use App\Entity\FloorPatternTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FloorPatternTranslationFixtures extends Fixture
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const HURRINGBONE_FR = 'patterns-hurringbone-fr';
    public const HURRINGBONE_EN = 'patterns-hurringbone-en';
    public const SOLID_FR = 'patterns-solid_fr';
    public const SOLID_EN = 'patterns-solid_en';
    public const VERSAILLES_FR = 'patterns-versailles-fr';
    public const VERSAILLES_EN = 'patterns-versailles-en';
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        // ~~~~~~~~~~~~~ HURRINGBONE ~~~~~~~~~~~~~ //
        $floorPatternTranslationFixture = new FloorPatternTranslation();
        $floorPatternTranslationFixture->setLocale('fr');
        $floorPatternTranslationFixture->setName('Hurringbone');
        $manager->persist($floorPatternTranslationFixture);
        $this->addReference(self::HURRINGBONE_FR, $floorPatternTranslationFixture);

        $floorPatternTranslationFixture = new FloorPatternTranslation();
        $floorPatternTranslationFixture->setLocale('en');
        $floorPatternTranslationFixture->setName('Hurringbone');
        $manager->persist($floorPatternTranslationFixture);
        $this->addReference(self::HURRINGBONE_EN, $floorPatternTranslationFixture);

        // ~~~~~~~~~~~~~~~~ SOLID ~~~~~~~~~~~~~~~~ //
        $floorPatternTranslationFixture = new FloorPatternTranslation();
        $floorPatternTranslationFixture->setLocale('fr');
        $floorPatternTranslationFixture->setName('solide');
        $manager->persist($floorPatternTranslationFixture);
        $this->addReference(self::SOLID_FR, $floorPatternTranslationFixture);

        $floorPatternTranslationFixture = new FloorPatternTranslation();
        $floorPatternTranslationFixture->setLocale('en');
        $floorPatternTranslationFixture->setName('solid');
        $manager->persist($floorPatternTranslationFixture);
        $this->addReference(self::SOLID_EN, $floorPatternTranslationFixture);

        // ~~~~~~~~~~~~~~ VERSAILLES ~~~~~~~~~~~~~ //
        $floorPatternTranslationFixture = new FloorPatternTranslation();
        $floorPatternTranslationFixture->setLocale('fr');
        $floorPatternTranslationFixture->setName('Versailles');
        $manager->persist($floorPatternTranslationFixture);
        $this->addReference(self::VERSAILLES_FR, $floorPatternTranslationFixture);

        $floorPatternTranslationFixture = new FloorPatternTranslation();
        $floorPatternTranslationFixture->setLocale('en');
        $floorPatternTranslationFixture->setName('Versailles');
        $manager->persist($floorPatternTranslationFixture);
        $this->addReference(self::VERSAILLES_EN, $floorPatternTranslationFixture);

        $manager->flush();
    }
}
