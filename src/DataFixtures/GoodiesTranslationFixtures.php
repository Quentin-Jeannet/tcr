<?php

namespace App\DataFixtures;

use App\Entity\GoodiesTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GoodiesTranslationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_PIN));
        $goodiesTranslation->setText('Pin');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_PIN));
        $goodiesTranslation->setText('Pin');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_PIN));
        $goodiesTranslation->setText('Pin');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_MUG));
        $goodiesTranslation->setText('Mug');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_MUG));
        $goodiesTranslation->setText('Mug');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_MUG));
        $goodiesTranslation->setText('Mok');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_T_SHIRT));
        $goodiesTranslation->setText('T-shirt');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_T_SHIRT));
        $goodiesTranslation->setText('T-shirt');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_T_SHIRT));
        $goodiesTranslation->setText('T-shirt');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_NOTEBOOK));
        $goodiesTranslation->setText('Notebook');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_NOTEBOOK));
        $goodiesTranslation->setText('Cahier');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_NOTEBOOK));
        $goodiesTranslation->setText('Blok');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_HAT));
        $goodiesTranslation->setText('Hat');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_HAT));
        $goodiesTranslation->setText('Casquette');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_HAT));
        $goodiesTranslation->setText('Hoed');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_CALENDAR));
        $goodiesTranslation->setText('Calendar');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_CALENDAR));
        $goodiesTranslation->setText('Calendrier');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_CALENDAR));
        $goodiesTranslation->setText('Kalender');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_JAR));
        $goodiesTranslation->setText('Jar');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_JAR));
        $goodiesTranslation->setText('Pot');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_JAR));
        $goodiesTranslation->setText('Pot');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_SWEET_SHIRT));
        $goodiesTranslation->setText('Sweet shirt');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_SWEET_SHIRT));
        $goodiesTranslation->setText('Sweetshirt');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_SWEET_SHIRT));
        $goodiesTranslation->setText('Zachte shirt');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_TOTE_BAG));
        $goodiesTranslation->setText('Tote bag');
        $goodiesTranslation->setLocale('en');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_TOTE_BAG));
        $goodiesTranslation->setText('Sac à main');
        $goodiesTranslation->setLocale('fr');
        $manager->persist($goodiesTranslation);

        $goodiesTranslation = new GoodiesTranslation();
        $goodiesTranslation->setGoodies($this->getReference(GoodiesFixtures::GOODIES_TOTE_BAG));
        $goodiesTranslation->setText('Handtas');
        $goodiesTranslation->setLocale('nl');
        $manager->persist($goodiesTranslation);       

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            GoodiesFixtures::class,
        ];
    }
}
