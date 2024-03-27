<?php

namespace App\DataFixtures;

use App\Entity\FloorTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FloorTranslationFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 1');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B1));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 1');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B1));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 1');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B1));
        $manager->persist($floorTranslation);
        
        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 2');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B2));
        $manager->persist($floorTranslation);
        
        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 2');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B2));
        $manager->persist($floorTranslation);
        
        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 2');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B2));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 3');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B3));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 3');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B3));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 3');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B3));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 4');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B4));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 4');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B4));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Basic 4');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_B4));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Bronx');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_BRONX));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Bronx');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_BRONX));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Bronx');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_BRONX));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Cognac');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_COGNAC));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Cognac');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_COGNAC));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Cognac');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_COGNAC));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Florida');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_FLORIDA));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Florida');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_FLORIDA));
        $manager->persist($floorTranslation)
        ;
        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Florida');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_FLORIDA));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Kossijd');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_KOKSIJD));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Kossijd');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_KOKSIJD));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Kossijd');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_KOKSIJD));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Military');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_MILITARY));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Military');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_MILITARY));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Military');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_MILITARY));
        $manager->persist($floorTranslation);

        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Stockholm');
        $floorTranslation->setLocale('en');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_STOCKHOLM));
        $manager->persist($floorTranslation);
        
        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Stockholm');
        $floorTranslation->setLocale('fr');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_STOCKHOLM));
        $manager->persist($floorTranslation);
        
        $floorTranslation = new FloorTranslation();
        $floorTranslation->setDescription('Stockholm');
        $floorTranslation->setLocale('nl');
        $floorTranslation->setFloor($this->getReference(FloorFixtures::FLOOR_STOCKHOLM));
        $manager->persist($floorTranslation);
        



        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['floor'];
    }

    public function getDependencies()
    {
        return [
            FloorFixtures::class,
        ];
    }
}
