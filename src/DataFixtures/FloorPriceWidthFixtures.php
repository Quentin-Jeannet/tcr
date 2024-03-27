<?php

namespace App\DataFixtures;

use App\Entity\FloorPriceWidth;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class FloorPriceWidthFixtures extends Fixture implements FixtureGroupInterface
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const FLOOR_PRICE_WIDTH_700_2200 = "floor_price_width1";
    public const FLOOR_PRICE_WIDTH2_2000_2400 = "floor_price_width2";

    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $floorPriceWidth = new FloorPriceWidth();
        $floorPriceWidth->setWidthIntitule('700/2200mm');
        $manager->persist($floorPriceWidth);
        $this->setReference(self::FLOOR_PRICE_WIDTH_700_2200, $floorPriceWidth);

        $floorPriceWidth = new FloorPriceWidth();
        $floorPriceWidth->setWidthIntitule('2000/2400mm');
        $manager->persist($floorPriceWidth);
        $this->setReference(self::FLOOR_PRICE_WIDTH2_2000_2400, $floorPriceWidth);

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
