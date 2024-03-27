<?php

namespace App\DataFixtures;

use App\Entity\FloorPrice;
use App\DataFixtures\FloorFixtures;
use Doctrine\Persistence\ObjectManager;
use App\Repository\FloorFamilyRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\FloorPriceTypeFixtures;
use App\DataFixtures\FloorPriceWidthFixtures;
use App\DataFixtures\FloorPriceLengthFixtures;
use App\DataFixtures\FloorPriceRenderFixtures;
use App\DataFixtures\FloorPriceFinitionFixtures;
use App\DataFixtures\FloorPriceThicknessFixtures;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;



class FloorPriceFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $repo;
    private $basicFamily;
    private $cityFamilly;
    private $coastFamily;
    private $timeFamily;
    private $villageFamily;
    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct(FloorFamilyRepository $floorFamilyRepository)
    {
        $this->repo = $floorFamilyRepository;
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        //
        $this->basicFamily = $this->repo->find(1);
        // $this->cityFamilly =  $this->repo->find(2);
        // $this->coastFamily =  $this->repo->find(3);
        // $this->timeFamily =  $this->repo->find(4);
        // $this->villageFamily =  $this->repo->find(5);
        //
        $floorPrice = new FloorPrice();
        $floorPrice->setPrice(63.9);
        $floorPrice->setFloorType($this->getReference(FloorPriceTypeFixtures::FLOOR_PRICE_TYPE_AB));
        $floorPrice->setFloorThickness($this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_14));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_130));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_160));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_190));
        $floorPrice->setFloorFamily($this->basicFamily);
        $floorPrice->setFloorRender($this->getReference(FloorPriceRenderFixtures::SOLID_BOARDS));
        $floorPrice->setFloorWidth($this->getReference(FloorPriceWidthFixtures::FLOOR_PRICE_WIDTH_700_2200));
        $manager->persist($floorPrice);
        
        $floorPrice = new FloorPrice();
        $floorPrice->setPrice(66.1);
        $floorPrice->setFloorType($this->getReference(FloorPriceTypeFixtures::FLOOR_PRICE_TYPE_AB));
        $floorPrice->setFloorThickness($this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_20));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_130));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_160));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_190));
        $floorPrice->setFloorFamily($this->basicFamily);
        $floorPrice->setFloorRender($this->getReference(FloorPriceRenderFixtures::SOLID_BOARDS));
        $floorPrice->setFloorWidth($this->getReference(FloorPriceWidthFixtures::FLOOR_PRICE_WIDTH_700_2200));
        $manager->persist($floorPrice);

        $floorPrice = new FloorPrice();
        $floorPrice->setPrice(48.2);
        $floorPrice->setFloorType($this->getReference(FloorPriceTypeFixtures::FLOOR_PRICE_TYPE_AB));
        $floorPrice->setFloorThickness($this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_12));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_185));
        $floorPrice->setFloorFamily($this->basicFamily);
        $floorPrice->setFloorRender($this->getReference(FloorPriceRenderFixtures::ENGENEERED_BOARDS));
        $floorPrice->setFloorWidth($this->getReference(FloorPriceWidthFixtures::FLOOR_PRICE_WIDTH2_2000_2400));
        $floorPrice->setFloorFinition($this->getReference(FloorPriceFinitionFixtures::SLIGHTLY_BRUSH));
        $manager->persist($floorPrice);

        $floorPrice = new FloorPrice();
        $floorPrice->setPrice(53.9);
        $floorPrice->setFloorType($this->getReference(FloorPriceTypeFixtures::FLOOR_PRICE_TYPE_AB));
        $floorPrice->setFloorThickness($this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_16));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_160));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_185));
        $floorPrice->setFloorFamily($this->basicFamily);
        $floorPrice->setFloorRender($this->getReference(FloorPriceRenderFixtures::ENGENEERED_BOARDS));
        $floorPrice->setFloorWidth($this->getReference(FloorPriceWidthFixtures::FLOOR_PRICE_WIDTH2_2000_2400));
        $floorPrice->setFloorFinition($this->getReference(FloorPriceFinitionFixtures::SLIGHTLY_BRUSH));
        $manager->persist($floorPrice);

        $floorPrice = new FloorPrice();
        $floorPrice->setPrice(55.9);
        $floorPrice->setFloorType($this->getReference(FloorPriceTypeFixtures::FLOOR_PRICE_TYPE_AB));
        $floorPrice->setFloorThickness($this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_16));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_220));
        $floorPrice->setFloorFamily($this->basicFamily);
        $floorPrice->setFloorRender($this->getReference(FloorPriceRenderFixtures::ENGENEERED_BOARDS));
        $floorPrice->setFloorWidth($this->getReference(FloorPriceWidthFixtures::FLOOR_PRICE_WIDTH2_2000_2400));
        $floorPrice->setFloorFinition($this->getReference(FloorPriceFinitionFixtures::SLIGHTLY_BRUSH));
        $manager->persist($floorPrice);

        $floorPrice = new FloorPrice();
        $floorPrice->setPrice(63.9);
        $floorPrice->setFloorType($this->getReference(FloorPriceTypeFixtures::FLOOR_PRICE_TYPE_AB));
        $floorPrice->setFloorThickness($this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_16));
        $floorPrice->addFloorlength($this->getReference(FloorPriceLengthFixtures::FLOOR_PRICE_LENGTH_260));
        $floorPrice->setFloorFamily($this->basicFamily);
        $floorPrice->setFloorRender($this->getReference(FloorPriceRenderFixtures::ENGENEERED_BOARDS));
        $floorPrice->setFloorWidth($this->getReference(FloorPriceWidthFixtures::FLOOR_PRICE_WIDTH2_2000_2400));
        $floorPrice->setFloorFinition($this->getReference(FloorPriceFinitionFixtures::SLIGHTLY_BRUSH));
        $manager->persist($floorPrice);
//  dd($this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_12),$this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_14),$this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_16),$this->getReference(FloorPriceThicknessFixtures::FLOOR_PRICE_THICKNESS_20));

        $manager->flush();
    }
    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //
    public static function getGroups(): array
    {
        return ['floor_price'];
    }
    public function getDependencies()
    {
        return [
            // FloorFixtures::class,
            FloorPriceTypeFixtures::class,
            FloorPriceThicknessFixtures::class,
            FloorPriceWidthFixtures::class,
            FloorPriceRenderFixtures::class,
            FloorPriceFinitionFixtures::class,
            FloorPriceLengthFixtures::class,
            // FloorFamilyFixtures::class,
        ];
    }
}
