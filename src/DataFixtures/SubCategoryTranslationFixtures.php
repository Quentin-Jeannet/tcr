<?php

namespace App\DataFixtures;

use App\Entity\SubCategoryTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SubCategoryTranslationFixtures extends Fixture implements DependentFixtureInterface
{

    public const SUB_CATEGORY_TRANSLATION_SURFACE_EN = 'sub_category_translation_surface_en';
    public const SUB_CATEGORY_TRANSLATION_SURFACE_FR = 'sub_category_translation_surface_fr';
    public const SUB_CATEGORY_TRANSLATION_SURFACE_NL = 'sub_category_translation_surface_nl';
    public const SUB_CATEGORY_TRANSLATION_FINISHES_EN = 'sub_category_translation_finishes_en';
    public const SUB_CATEGORY_TRANSLATION_FINISHES_FR = 'sub_category_translation_finishes_fr';
    public const SUB_CATEGORY_TRANSLATION_FINISHES_NL = 'sub_category_translation_finishes_nl';
    public const SUB_CATEGORY_TRANSLATION_MATERIAL_EN = 'sub_category_translation_material_en';
    public const SUB_CATEGORY_TRANSLATION_MATERIAL_FR = 'sub_category_translation_material_fr';
    public const SUB_CATEGORY_TRANSLATION_MATERIAL_NL = 'sub_category_translation_material_nl';
    public const SUB_CATEGORY_TRANSLATION_PRACTICAL_EN = 'sub_category_translation_practicals_en';
    public const SUB_CATEGORY_TRANSLATION_PRACTICAL_FR = 'sub_category_translation_practicals_fr';
    public const SUB_CATEGORY_TRANSLATION_PRACTICAL_NL = 'sub_category_translation_practicals_nl';
    public const SUB_CATEGORY_TRANSLATION_SHADES_EN = 'sub_category_translation_shades_en';
    public const SUB_CATEGORY_TRANSLATION_SHADES_FR = 'sub_category_translation_shades_fr';
    public const SUB_CATEGORY_TRANSLATION_SHADES_NL = 'sub_category_translation_shades_nl';
    public const SUB_CATEGORY_TRANSLATION_MAINTENANCE_EN = 'sub_category_translation_maintenance_en';
    public const SUB_CATEGORY_TRANSLATION_MAINTENANCE_FR = 'sub_category_translation_maintenance_fr';
    public const SUB_CATEGORY_TRANSLATION_MAINTENANCE_NL = 'sub_category_translation_maintenance_nl';
    public const SUB_CATEGORY_TRANSLATION_DIMENSIONS_EN = 'sub_category_translation_dimensions_en';
    public const SUB_CATEGORY_TRANSLATION_DIMENSIONS_FR = 'sub_category_translation_dimensions_fr';
    public const SUB_CATEGORY_TRANSLATION_DIMENSIONS_NL = 'sub_category_translation_dimensions_nl';
    public const SUB_CATEGORY_TRANSLATION_FIDBOX_EN = 'sub_category_translation_fidbox_en';
    public const SUB_CATEGORY_TRANSLATION_FIDBOX_FR = 'sub_category_translation_fidbox_fr';
    public const SUB_CATEGORY_TRANSLATION_FIDBOX_NL = 'sub_category_translation_fidbox_nl';
    public const SUB_CATEGORY_TRANSLATION_INTRO_EN = 'sub_category_translation_intro_en';
    public const SUB_CATEGORY_TRANSLATION_INTRO_FR = 'sub_category_translation_intro_fr';
    public const SUB_CATEGORY_TRANSLATION_INTRO_NL = 'sub_category_translation_intro_nl';
    public const SUB_CATEGORY_TRANSLATION_CONFIG_EN = 'sub_category_translation_config_en';
    public const SUB_CATEGORY_TRANSLATION_CONFIG_FR = 'sub_category_translation_config_fr';
    public const SUB_CATEGORY_TRANSLATION_CONFIG_NL = 'sub_category_translation_config_nl';
    public const SUB_CATEGORY_TRANSLATION_POSTED_EN = 'sub_category_translation_posted_en';
    public const SUB_CATEGORY_TRANSLATION_POSTED_FR = 'sub_category_translation_posted_fr';
    public const SUB_CATEGORY_TRANSLATION_POSTED_NL = 'sub_category_translation_posted_nl';
    public const SUB_CATEGORY_TRANSLATION_MISSION_EN = 'sub_category_translation_mission_en';
    public const SUB_CATEGORY_TRANSLATION_MISSION_FR = 'sub_category_translation_mission_fr';
    public const SUB_CATEGORY_TRANSLATION_MISSION_NL = 'sub_category_translation_mission_nl';
    public const SUB_CATEGORY_TRANSLATION_HISTORY_EN = 'sub_category_translation_specifications_en';
    public const SUB_CATEGORY_TRANSLATION_HISTORY_FR = 'sub_category_translation_specifications_fr';
    public const SUB_CATEGORY_TRANSLATION_HISTORY_NL = 'sub_category_translation_specifications_nl';
    public const SUB_CATEGORY_TRANSLATION_ABOUT_EN = 'sub_category_translation_about_en';
    public const SUB_CATEGORY_TRANSLATION_ABOUT_FR = 'sub_category_translation_about_fr';
    public const SUB_CATEGORY_TRANSLATION_ABOUT_NL = 'sub_category_translation_about_nl';
    public const SUB_CATEGORY_TRANSLATION_SAFETY_EN = 'sub_category_translation_safety_en';
    public const SUB_CATEGORY_TRANSLATION_SAFETY_FR = 'sub_category_translation_safety_fr';
    public const SUB_CATEGORY_TRANSLATION_SAFETY_NL = 'sub_category_translation_safety_nl';
    public const SUB_CATEGORY_TRANSLATION_TRANSPORT_EN = 'sub_category_translation_transport_en';
    public const SUB_CATEGORY_TRANSLATION_TRANSPORT_FR = 'sub_category_translation_transport_fr';
    public const SUB_CATEGORY_TRANSLATION_TRANSPORT_NL = 'sub_category_translation_transport_nl';




    public function load(ObjectManager $manager): void
    {
        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Surface');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Surface');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_1));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SURFACE_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Surface');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Surface');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_1));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SURFACE_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Oppervlakte');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Oppervlakte');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_1));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SURFACE_NL, $subCategoryTranslation);


        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Finishes');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Finishes');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_2));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_FINISHES_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Finitions');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Finitions');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_2));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_FINISHES_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Afwerkingen');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Afwerkingen');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_2));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_FINISHES_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Material solid / engineered');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Material solid / engineered');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_3));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MATERIAL_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Matériel solide / ingéniéré');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Matériel solide / ingéniéré');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_3));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MATERIAL_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Materiaal vaste / geconstrueerd');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Materiaal vaste / geconstrueerd');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_3));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MATERIAL_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Practical tips');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Practical tips');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_4));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_PRACTICAL_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Astuces pratiques');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Astuces pratiques');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_4));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_PRACTICAL_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Practical tips');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Practical tips');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_4));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_PRACTICAL_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Shades');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Shades');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_5));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SHADES_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Nuances');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Nuances');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_5));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SHADES_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Tinten');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Tinten');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_5));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SHADES_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Maintenance');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Maintenance');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_6));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MAINTENANCE_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Maintenance');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Maintenance');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_6));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MAINTENANCE_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Onderhoud');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Onderhoud');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_6));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MAINTENANCE_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Dimensions');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Dimensions');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_7));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_DIMENSIONS_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Dimensions');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Dimensions');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_7));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_DIMENSIONS_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Dimensions');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Dimensions');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_7));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_DIMENSIONS_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Fidbox Electronic Monitoring System');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Fidbox Electronic Monitoring System');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_8));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_FIDBOX_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Fidbox Electronic Monitoring System');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Fidbox Electronic Monitoring System');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_8));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_FIDBOX_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Fidbox Electronic Monitoring System');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Fidbox Electronic Monitoring System');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_8));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_FIDBOX_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Intro (explanation)');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Intro (explanation)');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_9));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_INTRO_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Intro (explications)');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Intro (explications)');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_9));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_INTRO_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Intro (uitleg)');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Intro (uitleg)');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_9));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_INTRO_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Configurator');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Configurator');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_10));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_CONFIG_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Configurateur');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Configurateur');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_10));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_CONFIG_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Configurator');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Configurator');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_10));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_CONFIG_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Posted');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Posted');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_11));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_POSTED_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Réalisation');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Réalisation');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_11));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_POSTED_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Realisatie');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Realisatie');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_11));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_POSTED_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Mission statements');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Mission statements');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_12));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MISSION_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Nos mission');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Nos mission');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_12));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MISSION_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Nos missies');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Nos missies');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_12));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_MISSION_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('History');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('History');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_13));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_HISTORY_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Histoire');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Histoire');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_13));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_HISTORY_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Geschiedenis');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Geschiedenis');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_13));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_HISTORY_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('About us');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('About us');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_14));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_ABOUT_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('A propos');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('A propos');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_14));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_ABOUT_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Over ons');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Over ons');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_14));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_ABOUT_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Safety sheets');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Safety sheets');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_15));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SAFETY_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Feuille de sécurité');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Feuille de sécurité');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_15));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SAFETY_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Veiligheidsblad');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Veiligheidsblad');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_15));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_SAFETY_NL, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Transport');
        $subCategoryTranslation->setLocale('en');
        $subCategoryTranslation->setDescription('Transport');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_16));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_TRANSPORT_EN, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Transport');
        $subCategoryTranslation->setLocale('fr');
        $subCategoryTranslation->setDescription('Transport');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_16));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_TRANSPORT_FR, $subCategoryTranslation);

        $subCategoryTranslation = new SubCategoryTranslation();
        $subCategoryTranslation->setText('Transport');
        $subCategoryTranslation->setLocale('nl');
        $subCategoryTranslation->setDescription('Transport');
        $subCategoryTranslation->setSubCategory($this->getReference(SubCategoryFixtures::SUB_CATEGORY_16));
        $manager->persist($subCategoryTranslation);
        $this->addReference(self::SUB_CATEGORY_TRANSLATION_TRANSPORT_NL, $subCategoryTranslation);
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SubCategoryFixtures::class,
        ];
    }
}
