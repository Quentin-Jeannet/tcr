<?php

namespace App\DataFixtures;

use App\Entity\FloorPriceLength;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;



class FloorPriceLengthFixtures extends Fixture implements FixtureGroupInterface
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const FLOOR_PRICE_LENGTH_130 = "floor_price_length_130";
    public const FLOOR_PRICE_LENGTH_160 = "floor_price_length_160";
    public const FLOOR_PRICE_LENGTH_185 = "floor_price_length_185";
    public const FLOOR_PRICE_LENGTH_190 = "floor_price_length_190";
    public const FLOOR_PRICE_LENGTH_220 = "floor_price_length_220";
    public const FLOOR_PRICE_LENGTH_260 = "floor_price_length_260";
    public const FLOOR_PRICE_LENGTH_280 = "floor_price_length_280";
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $floorPriceLength = new FloorPriceLength();
        $floorPriceLength->setLength(130);
        $manager->persist($floorPriceLength);
        $this->setReference(self::FLOOR_PRICE_LENGTH_130, $floorPriceLength);

        $floorPriceLength = new FloorPriceLength();
        $floorPriceLength->setLength(160);
        $manager->persist($floorPriceLength);
        $this->setReference(self::FLOOR_PRICE_LENGTH_160, $floorPriceLength);

        $floorPriceLength = new FloorPriceLength();
        $floorPriceLength->setLength(185);
        $manager->persist($floorPriceLength);
        $this->setReference(self::FLOOR_PRICE_LENGTH_185, $floorPriceLength);

        $floorPriceLength = new FloorPriceLength();
        $floorPriceLength->setLength(190);
        $manager->persist($floorPriceLength);
        $this->setReference(self::FLOOR_PRICE_LENGTH_190, $floorPriceLength);

        $floorPriceLength = new FloorPriceLength();
        $floorPriceLength->setLength(220);
        $manager->persist($floorPriceLength);
        $this->setReference(self::FLOOR_PRICE_LENGTH_220, $floorPriceLength);

        $floorPriceLength = new FloorPriceLength();
        $floorPriceLength->setLength(260);
        $manager->persist($floorPriceLength);
        $this->setReference(self::FLOOR_PRICE_LENGTH_260, $floorPriceLength);

        $floorPriceLength = new FloorPriceLength();
        $floorPriceLength->setLength(280);
        $manager->persist($floorPriceLength);
        $this->setReference(self::FLOOR_PRICE_LENGTH_280, $floorPriceLength);

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
