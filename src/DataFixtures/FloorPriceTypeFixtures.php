<?php

namespace App\DataFixtures;

use App\Entity\FloorPriceType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class FloorPriceTypeFixtures extends Fixture implements FixtureGroupInterface
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    const FLOOR_PRICE_TYPE_A = 'floor_price_type_A';
    const FLOOR_PRICE_TYPE_AB = 'floor_price_type_AB';
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $floorPriceType = new FloorPriceType();
        $floorPriceType->setName('A');
        $manager->persist($floorPriceType);
        $this->addReference(self::FLOOR_PRICE_TYPE_A, $floorPriceType);

        $floorPriceType = new FloorPriceType();
        $floorPriceType->setName('A/B');
        $manager->persist($floorPriceType);
        $this->addReference(self::FLOOR_PRICE_TYPE_AB, $floorPriceType);

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
