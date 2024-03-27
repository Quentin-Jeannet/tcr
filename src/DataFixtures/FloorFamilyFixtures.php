<?php

namespace App\DataFixtures;

use App\Entity\FloorFamily;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class FloorFamilyFixtures extends Fixture implements FixtureGroupInterface
{
    const FLOOR_FAMILY_BASIC = 'floor_family_basic';
    const FLOOR_FAMILY_CITY = 'floor_family_city';
    const FLOOR_FAMILY_COAST = 'floor_family_coast';
    const FLOOR_FAMILY_TIME = 'floor_family_time';
    const FLOOR_FAMILY_VILLAGE = 'floor_family_village';

    public function load(ObjectManager $manager): void
    {
        $floorFamily = new FloorFamily();
        $floorFamily->setText('Basic');
        $floorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floorFamily);
        $this->addReference(self::FLOOR_FAMILY_BASIC, $floorFamily);

        $floorFamily = new FloorFamily();
        $floorFamily->setText('City');
        $floorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floorFamily);
        $this->addReference(self::FLOOR_FAMILY_CITY, $floorFamily);

        $floorFamily = new FloorFamily();
        $floorFamily->setText('Coast');
        $floorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floorFamily);
        $this->addReference(self::FLOOR_FAMILY_COAST, $floorFamily);

        $floorFamily = new FloorFamily();
        $floorFamily->setText('Time');
        $floorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floorFamily);
        $this->addReference(self::FLOOR_FAMILY_TIME, $floorFamily);

        $floorFamily = new FloorFamily();
        $floorFamily->setText('Village');
        $floorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $manager->persist($floorFamily);
        $this->addReference(self::FLOOR_FAMILY_VILLAGE, $floorFamily);


        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['floor'];
    }
}
