<?php

namespace App\DataFixtures;

use App\Entity\FloorPriceThickness;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class FloorPriceThicknessFixtures extends Fixture implements FixtureGroupInterface
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const FLOOR_PRICE_THICKNESS_12 = 'floor_price_thickness_12';
    public const FLOOR_PRICE_THICKNESS_14 = 'floor_price_thickness_14';
    public const FLOOR_PRICE_THICKNESS_16 = 'floor_price_thickness_16';
    public const FLOOR_PRICE_THICKNESS_20 = 'floor_price_thickness_20';
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $floorPriceThickness = new FloorPriceThickness();
        $floorPriceThickness->setThickness(12);
        $manager->persist($floorPriceThickness);
        $this->addReference(self::FLOOR_PRICE_THICKNESS_12, $floorPriceThickness);

        $floorPriceThickness = new FloorPriceThickness();
        $floorPriceThickness->setThickness(14);
        $manager->persist($floorPriceThickness);
        $this->addReference(self::FLOOR_PRICE_THICKNESS_14, $floorPriceThickness);

        $floorPriceThickness = new FloorPriceThickness();
        $floorPriceThickness->setThickness(16);
        $manager->persist($floorPriceThickness);
        $this->addReference(self::FLOOR_PRICE_THICKNESS_16, $floorPriceThickness);

        $floorPriceThickness = new FloorPriceThickness();
        $floorPriceThickness->setThickness(20);
        $manager->persist($floorPriceThickness);
        $this->addReference(self::FLOOR_PRICE_THICKNESS_20, $floorPriceThickness);

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
