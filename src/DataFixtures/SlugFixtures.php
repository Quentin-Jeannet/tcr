<?php

namespace App\DataFixtures;

use App\Entity\Slug;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\CategoryTranslationFixtures;
use App\DataFixtures\SubCategoryTranslationFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SlugFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $slug = new Slug();
        $slug->setText('paint');
        $slug->setLocale('en');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_PAINT_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setText('peinture');
        $slug->setLocale('fr');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_PAINT_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setText('verf');
        $slug->setLocale('nl');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_PAINT_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('home');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_HOME_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('acceuil');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_HOME_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('ontvangst');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_HOME_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('wall');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_WALL_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('mur');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_WALL_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('muur');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_WALL_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('flooring');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_FLOORING_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('parquets');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_FLOORING_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('parkuet');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_FLOORING_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('configurator');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_CONFIGURATOR_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('configurateur');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_CONFIGURATOR_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('configuratie');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_CONFIGURATOR_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('contact');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_CONTACT_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('contact');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_CONTACT_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('contact');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_CONTACT_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('goodies');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_GOODIES_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('goodies');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_GOODIES_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('goodies');
        $slug->setCategoryTranslation($this->getReference(CategoryTranslationFixtures::CATEGORY_GOODIES_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('surface');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SURFACE_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('surface');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SURFACE_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('oppervlak');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SURFACE_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('finishes');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_FINISHES_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('finitions');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_FINISHES_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('eindigt');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_FINISHES_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('material');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MATERIAL_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('matériaux');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MATERIAL_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('materiaal');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MATERIAL_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('tips');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_PRACTICAL_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('conseils');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_PRACTICAL_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('tips');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_PRACTICAL_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('shades');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SHADES_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('nuances');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SHADES_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('schaduwen');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SHADES_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('maintenance');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MAINTENANCE_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('maintenance');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MAINTENANCE_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('onderhoud');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MAINTENANCE_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('dimensions');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_DIMENSIONS_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('dimensions');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_DIMENSIONS_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('afmetingen');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_DIMENSIONS_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('fidebox');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_FIDBOX_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('fidebox');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_FIDBOX_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('fidebox');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_FIDBOX_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('intro');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_INTRO_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('intro');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_INTRO_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('intro');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_INTRO_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('configurator');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_CONFIG_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('configurateur');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_CONFIG_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('configurator');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_CONFIG_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('posted');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_POSTED_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('realistion');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_POSTED_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('realistie');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_POSTED_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('missions');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MISSION_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('missions');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MISSION_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('missies');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_MISSION_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('history');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_HISTORY_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('histoire');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_HISTORY_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('geschiedenis');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_HISTORY_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('about us');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_ABOUT_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('a propos');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_ABOUT_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('over ons');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_ABOUT_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('safety');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SAFETY_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('sécurité');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SAFETY_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('veiligheid');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_SAFETY_NL));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('en');
        $slug->setText('transport');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_TRANSPORT_EN));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('fr');
        $slug->setText('transport');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_TRANSPORT_FR));
        $manager->persist($slug);

        $slug = new Slug();
        $slug->setLocale('nl');
        $slug->setText('transport');
        $slug->setSubCategoryTranslation($this->getReference(SubCategoryTranslationFixtures::SUB_CATEGORY_TRANSLATION_TRANSPORT_NL));
        $manager->persist($slug);





























        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryTranslationFixtures::class,
            SubCategoryTranslationFixtures::class,
        ];
    }
}
