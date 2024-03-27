<?php

namespace App\DataFixtures;

use App\Entity\FloorPriceFinition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class FloorPriceFinitionFixtures extends Fixture implements FixtureGroupInterface
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const SLIGHTLY_BRUSH = "slightly brushed";
    public const DESIGN = "design";
    public const BRUSHED = "brushed";
    public const AGED = "aged";
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $floorFinition = new FloorPriceFinition();
        $floorFinition->setName("Slightly brushed");
        $manager->persist($floorFinition);
        $this->addReference(self::SLIGHTLY_BRUSH, $floorFinition);

        $floorFinition = new FloorPriceFinition();
        $floorFinition->setName("Design");
        $manager->persist($floorFinition);
        $this->addReference(self::DESIGN, $floorFinition);

        $floorFinition = new FloorPriceFinition();
        $floorFinition->setName("Brushed");
        $manager->persist($floorFinition);
        $this->addReference(self::BRUSHED, $floorFinition);

        $floorFinition = new FloorPriceFinition();
        $floorFinition->setName("Aged");
        $manager->persist($floorFinition);
        $this->addReference(self::AGED, $floorFinition);

        $manager->flush();
    }
    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //
    public static function getGroups(): array
    {
        return ['floor_price'];
    }
}
