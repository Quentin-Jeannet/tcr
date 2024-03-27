<?php

namespace App\DataFixtures;

use App\Entity\CategoryTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CategoryTranslationFixtures extends Fixture implements DependentFixtureInterface
{

    public const CATEGORY_HOME_EN = 'category_home_en';
    public const CATEGORY_HOME_FR = 'category_home_fr';
    public const CATEGORY_HOME_NL = 'category_home_nl';

    public const CATEGORY_PAINT_EN = 'category_paint_en';
    public const CATEGORY_PAINT_FR = 'category_paint_fr';
    public const CATEGORY_PAINT_NL = 'category_paint_nl';

    public const CATEGORY_FLOORING_EN = 'category_flooring_en';
    public const CATEGORY_FLOORING_FR = 'category_flooring_fr';
    public const CATEGORY_FLOORING_NL = 'category_flooring_nl';

    public const CATEGORY_WALL_EN = 'category_wall_en';
    public const CATEGORY_WALL_FR = 'category_wall_fr';
    public const CATEGORY_WALL_NL = 'category_wall_nl';

    public const CATEGORY_GOODIES_EN = 'category_goodies_en';
    public const CATEGORY_GOODIES_FR = 'category_goodies_fr';
    public const CATEGORY_GOODIES_NL = 'category_goodies_nl';

    public const CATEGORY_CONFIGURATOR_EN = 'category_configurator_en';
    public const CATEGORY_CONFIGURATOR_FR = 'category_configurator_fr';
    public const CATEGORY_CONFIGURATOR_NL = 'category_configurator_nl';

    public const CATEGORY_CONTACT_EN = 'category_contact_en';
    public const CATEGORY_CONTACT_FR = 'category_contact_fr';
    public const CATEGORY_CONTACT_NL = 'category_contact_nl';

    


    public function load(ObjectManager $manager): void
    {
        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Declaration');
        $categoryTranslation->setLocale('en');
        $categoryTranslation->setImageName('affiche-home.jpg');
        $categoryTranslation->setDescription('<p>Declaration</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_HOME));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_HOME_EN, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Déclaration');
        $categoryTranslation->setLocale('fr');
        $categoryTranslation->setImageName('affiche-home.jpg');
        $categoryTranslation->setDescription('<p>Déclaration</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_HOME));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_HOME_FR, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Verklaring');
        $categoryTranslation->setLocale('nl');
        $categoryTranslation->setImageName('affiche-home.jpg');
        $categoryTranslation->setDescription('<p>Verklaring</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_HOME));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_HOME_NL, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Paint');
        $categoryTranslation->setLocale('en');
        $categoryTranslation->setImageName('affiche-paint.jpg');
        $categoryTranslation->setDescription('<p>Paint</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_PAINT_EN, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Peinture');
        $categoryTranslation->setLocale('fr');
        $categoryTranslation->setImageName('affiche-paint.jpg');
        $categoryTranslation->setDescription('<p>Peinture</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_PAINT_FR, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Verf');
        $categoryTranslation->setLocale('nl');
        $categoryTranslation->setImageName('affiche-paint.jpg');
        $categoryTranslation->setDescription('<p>Verf</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_PAINT_NL, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Flooring');
        $categoryTranslation->setLocale('en');
        $categoryTranslation->setImageName('affiche-floor.jpg');
        $categoryTranslation->setDescription('<p>Flooring</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_FLOORING_EN, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Parquets');
        $categoryTranslation->setLocale('fr');
        $categoryTranslation->setImageName('affiche-floor.jpg');
        $categoryTranslation->setDescription('<p>Parquets</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_FLOORING_FR, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Parquetten');
        $categoryTranslation->setLocale('nl');
        $categoryTranslation->setImageName('affiche-floor.jpg');
        $categoryTranslation->setDescription('<p>Parquetten</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_FLOORING_NL, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Wall');
        $categoryTranslation->setLocale('en');
        $categoryTranslation->setImageName('affiche-wall.jpg');
        $categoryTranslation->setDescription('<p>Wall</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_WALL));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_WALL_EN, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Mur');
        $categoryTranslation->setLocale('fr');
        $categoryTranslation->setImageName('affiche-wall.jpg');
        $categoryTranslation->setDescription('<p>Mur</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_WALL));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_WALL_FR, $categoryTranslation);
        
        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Muur');
        $categoryTranslation->setLocale('nl');
        $categoryTranslation->setImageName('affiche-wall.jpg');
        $categoryTranslation->setDescription('<p>Muur</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_WALL));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_WALL_NL, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Goodies');
        $categoryTranslation->setLocale('en');
        $categoryTranslation->setImageName('affiche-goodies.jpg');
        $categoryTranslation->setDescription('<p>Goodies</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_GOODIES_EN, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Accessoires');
        $categoryTranslation->setLocale('fr');
        $categoryTranslation->setImageName('affiche-goodies.jpg');
        $categoryTranslation->setDescription('<p>Accessoires</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_GOODIES_FR, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Goodies');
        $categoryTranslation->setLocale('nl');
        $categoryTranslation->setImageName('affiche-goodies.jpg');
        $categoryTranslation->setDescription('<p>Goodies</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_GOODIES_NL, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Configurator');
        $categoryTranslation->setLocale('en');
        $categoryTranslation->setImageName('affiche-config.jpg');
        $categoryTranslation->setDescription('<p>Configurator</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_CONFIGURATOR));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_CONFIGURATOR_EN, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Configurateur');
        $categoryTranslation->setLocale('fr');
        $categoryTranslation->setImageName('affiche-config.jpg');
        $categoryTranslation->setDescription('<p>Configurateur</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_CONFIGURATOR));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_CONFIGURATOR_FR, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Configurator');
        $categoryTranslation->setLocale('nl');
        $categoryTranslation->setImageName('affiche-config.jpg');
        $categoryTranslation->setDescription('<p>Configurator</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_CONFIGURATOR));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_CONFIGURATOR_NL, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Contact');
        $categoryTranslation->setLocale('en');
        $categoryTranslation->setImageName('affiche-contact.jpg');
        $categoryTranslation->setDescription('<p>Contact</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_CONTACT));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_CONTACT_EN, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Contact');
        $categoryTranslation->setLocale('fr');
        $categoryTranslation->setImageName('affiche-contact.jpg');
        $categoryTranslation->setDescription('<p>Contact</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_CONTACT));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_CONTACT_FR, $categoryTranslation);

        $categoryTranslation = new CategoryTranslation();
        $categoryTranslation->setText('Contact');
        $categoryTranslation->setLocale('nl');
        $categoryTranslation->setImageName('affiche-contact.jpg');
        $categoryTranslation->setDescription('<p>Contact</p>');
        $categoryTranslation->setCategory($this->getReference(CategoryFixtures::CATEGORY_CONTACT));
        $manager->persist($categoryTranslation);
        $this->addReference(self::CATEGORY_CONTACT_NL, $categoryTranslation);








        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
