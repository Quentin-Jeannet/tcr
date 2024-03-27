<?php

namespace App\DataFixtures;

use App\Entity\Floor;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FloorFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{
    const FLOOR_B1 = 'floor_b1';
    const FLOOR_B2 = 'floor_b2';
    const FLOOR_B3 = 'floor_b3';
    const FLOOR_B4 = 'floor_b4';
    const FLOOR_BRONX = 'floor_bronx';
    const FLOOR_COGNAC = 'floor_cognac';
    const FLOOR_FLORIDA = 'floor_florida';
    const FLOOR_KOKSIJD = 'floor_kossijd';
    const FLOOR_MILITARY = 'floor_military';
    const FLOOR_STOCKHOLM = 'floor_stockholm';


    public function load(ObjectManager $manager): void
    {
        $floor = new Floor();
        $floor->setText('B1');
        $floor->setImageName('B1.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_BASIC));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_B1, $floor);

        $floor = new Floor();
        $floor->setText('B2');
        $floor->setImageName('B2.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_BASIC));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_B2, $floor);

        $floor = new Floor();
        $floor->setText('B3');
        $floor->setImageName('B3.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_BASIC));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_B3, $floor);

        $floor = new Floor();
        $floor->setText('B4');
        $floor->setImageName('B4.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_BASIC));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_B4, $floor);

        $floor = new Floor();
        $floor->setText('Bronx');
        $floor->setImageName('city_bronx.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_BRONX, $floor);

        $floor = new Floor();
        $floor->setText('Cognac');
        $floor->setImageName('city_cognac.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_COGNAC, $floor);

        $floor = new Floor();
        $floor->setText('Florida');
        $floor->setImageName('city_florida.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_FLORIDA, $floor);

        $floor = new Floor();
        $floor->setText('Koksijde');
        $floor->setImageName('city_koksijde.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_KOKSIJD, $floor);

        $floor = new Floor();
        $floor->setText('Military');
        $floor->setImageName('city_military.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_MILITARY, $floor);

        $floor = new Floor();
        $floor->setText('Stockholm');
        $floor->setImageName('city_stockholm.jpg');
        $floor->setFloorFamily($this->getReference(FloorFamilyFixtures::FLOOR_FAMILY_CITY));
        $floor->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floor);
        $this->addReference(self::FLOOR_STOCKHOLM, $floor);


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
