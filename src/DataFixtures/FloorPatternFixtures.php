<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\FloorPattern;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\FloorPatternTranslationFixtures;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FloorPatternFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $floorPattern = new FloorPattern();
        $floorPattern->setImageName('patterns-hurringbone.jpg');
        $floorPattern->setUpdatedAt(new DateTimeImmutable());
        $floorPattern->addTranslation($this->getReference(FloorPatternTranslationFixtures::HURRINGBONE_FR));
        $floorPattern->addTranslation($this->getReference(FloorPatternTranslationFixtures::HURRINGBONE_EN));
        $manager->persist($floorPattern);

        $floorPattern = new FloorPattern();
        $floorPattern->setImageName('patterns-solid.jpg');
        $floorPattern->setUpdatedAt(new DateTimeImmutable());
        $floorPattern->addTranslation($this->getReference(FloorPatternTranslationFixtures::SOLID_FR));
        $floorPattern->addTranslation($this->getReference(FloorPatternTranslationFixtures::SOLID_EN));
        $manager->persist($floorPattern);

        $floorPattern = new FloorPattern();
        $floorPattern->setImageName('patterns-versailles.jpg');
        $floorPattern->addTranslation($this->getReference(FloorPatternTranslationFixtures::VERSAILLES_FR));
        $floorPattern->addTranslation($this->getReference(FloorPatternTranslationFixtures::VERSAILLES_EN));
        $floorPattern->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($floorPattern);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['floor-pattern'];
    }

    public function getDependencies()
    {
        return [
            FloorPatternTranslationFixtures::class,
        ];
    }
}
