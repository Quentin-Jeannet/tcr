<?php

namespace App\DataFixtures;

use App\Entity\FloorFamilyTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FloorFamilyTranslationFixtures extends Fixture implements FixtureGroupInterface , DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('Basic');
        $floorFamilyTranslation->setLocale('en');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_BASIC));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('Basic');
        $floorFamilyTranslation->setLocale('fr');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_BASIC));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('Basic');
        $floorFamilyTranslation->setLocale('nl');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_BASIC));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('city');
        $floorFamilyTranslation->setLocale('en');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('city');
        $floorFamilyTranslation->setLocale('fr');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('city');
        $floorFamilyTranslation->setLocale('nl');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('coast');
        $floorFamilyTranslation->setLocale('en');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_COAST));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('coast');
        $floorFamilyTranslation->setLocale('fr');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_COAST));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('coast');
        $floorFamilyTranslation->setLocale('nl');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_COAST));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('time');
        $floorFamilyTranslation->setLocale('en');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_TIME));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('time');
        $floorFamilyTranslation->setLocale('fr');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_TIME));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('time');
        $floorFamilyTranslation->setLocale('nl');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_TIME));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('village');
        $floorFamilyTranslation->setLocale('en');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_VILLAGE));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('village');
        $floorFamilyTranslation->setLocale('fr');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_VILLAGE));
        $manager->persist($floorFamilyTranslation);

        $floorFamilyTranslation = new FloorFamilyTranslation();
        $floorFamilyTranslation->setDescription('village');
        $floorFamilyTranslation->setLocale('nl');
        $floorFamilyTranslation->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_VILLAGE));
        $manager->persist($floorFamilyTranslation);
        
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['floor'];
    }

    public function getDependencies()
    {
        return [
            FloorFamilyFixtures::class,
        ];
    }
}
