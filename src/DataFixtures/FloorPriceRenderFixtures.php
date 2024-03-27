<?php

namespace App\DataFixtures;

use App\Entity\FloorPriceRender;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class FloorPriceRenderFixtures extends Fixture  implements FixtureGroupInterface
{
    // ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //
public const SOLID_BOARDS = "solid-boards";
public const ENGENEERED_BOARDS = "engenereed-boards";
// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $floorPriceRender = new FloorPriceRender();
        $floorPriceRender->setName("Solid boards");
        $manager->persist($floorPriceRender);
        $this->setReference(self::SOLID_BOARDS, $floorPriceRender);

        $floorPriceRender = new FloorPriceRender();
        $floorPriceRender->setName("Engeneered boards");
        $manager->persist($floorPriceRender);
        $this->setReference(self::ENGENEERED_BOARDS, $floorPriceRender);

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
