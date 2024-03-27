<?php

namespace App\DataFixtures;

use App\Entity\ColorFamilyTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ColorFamilyTranslationFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Blue');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_BLUE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Bleu');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_BLUE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Blauw');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_BLUE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Purple Bleu');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PURPLEBLUE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Bleu violet');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PURPLEBLUE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Blauw paars');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PURPLEBLUE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Purple');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PURPLE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Violet');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PURPLE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Paars');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PURPLE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Dark');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_DARK));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Sombre');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_DARK));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Donker');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_DARK));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Green');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_GREEN));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Vert');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_GREEN));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Groen');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_GREEN));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Grey');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_GREY));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Gris');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_GREY));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Grijs');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_GREY));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Neutral');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_NEUTRAL));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Neutre');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_NEUTRAL));    
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Neutraal');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_NEUTRAL));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Orange');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_ORANGE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Orange');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_ORANGE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Oranje');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_ORANGE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Red & Pink');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_RED));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Rouge & Rose');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_RED));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Rood & roze');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_RED));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('White');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_WHITE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Blanc');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_WHITE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Wit');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_WHITE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Yellow');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_YELLOW));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Jaune');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_YELLOW));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Geel');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_YELLOW));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Basic');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_BASIC));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Basic');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_BASIC));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Basic');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_BASIC));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('City');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_CITY));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('City');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_CITY));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('City');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_CITY));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Village');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_VILLAGE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Village');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_VILLAGE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Village');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_VILLAGE));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Time');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_TIME));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Time');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_TIME));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Time');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_TIME));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Coast');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_COAST));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Coast');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_COAST));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Coast');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_COAST));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('en');
        $colorFamilyTranslation->setText('Painted floor');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PAINTEDFLOOR));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('fr');
        $colorFamilyTranslation->setText('Painted floor');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PAINTEDFLOOR));
        $manager->persist($colorFamilyTranslation);

        $colorFamilyTranslation = new ColorFamilyTranslation();
        $colorFamilyTranslation->setLocale('nl');
        $colorFamilyTranslation->setText('Painted floor');
        $colorFamilyTranslation->setColorFamily($this->getReference(ColorFamilyFixtures::COLOR_FAMILY_PAINTEDFLOOR));
        $manager->persist($colorFamilyTranslation);


        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ColorFamilyFixtures::class,
        );
    }
}
