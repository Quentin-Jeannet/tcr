<?php

namespace App\DataFixtures;

use App\Entity\ColorFamily;
use App\DataFixtures\ColorFixtures;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ColorFamilyFixtures extends Fixture implements DependentFixtureInterface
{

    public const COLOR_FAMILY_BLUE = 'color_family_blue';
    public const COLOR_FAMILY_PURPLEBLUE = 'color_family_purpleblue';
    public const COLOR_FAMILY_PURPLE = 'color_family_purple';
    public const COLOR_FAMILY_DARK = 'color_family_dark';
    public const COLOR_FAMILY_GREEN = 'color_family_green';
    public const COLOR_FAMILY_GREY = 'color_family_grey';
    public const COLOR_FAMILY_NEUTRAL = 'color_family_neutral';
    public const COLOR_FAMILY_ORANGE = 'color_family_orange';
    public const COLOR_FAMILY_RED = 'color_family_red';
    public const COLOR_FAMILY_WHITE = 'color_family_white';
    public const COLOR_FAMILY_YELLOW = 'color_family_yellow';
    public const COLOR_FAMILY_BASIC = 'color_family_basic';
    public const COLOR_FAMILY_CITY = 'color_family_city';
    public const COLOR_FAMILY_VILLAGE = 'color_family_village';
    public const COLOR_FAMILY_TIME = 'color_family_time';
    public const COLOR_FAMILY_COAST = 'color_family_coast';
    public const COLOR_FAMILY_PAINTEDFLOOR = 'color_family_mountain';

    public function load(ObjectManager $manager): void
    {
        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Blue');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_47'));
        $colorFamily->addColor($this->getReference('color_69'));
        $colorFamily->addColor($this->getReference('color_75'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_BLUE, $colorFamily);

        
        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Purple-Blue');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_42'));
        $colorFamily->addColor($this->getReference('color_44'));
        $colorFamily->addColor($this->getReference('color_46'));
        $colorFamily->addColor($this->getReference('color_49'));
        $colorFamily->addColor($this->getReference('color_53'));
        $colorFamily->addColor($this->getReference('color_54'));
        $colorFamily->addColor($this->getReference('color_58'));
        $colorFamily->addColor($this->getReference('color_60'));
        $colorFamily->addColor($this->getReference('color_71'));
        $colorFamily->addColor($this->getReference('color_90'));
        $colorFamily->addColor($this->getReference('color_91'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_PURPLEBLUE, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Purple');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_PURPLE, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Dark');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_1'));
        $colorFamily->addColor($this->getReference('color_4'));
        $colorFamily->addColor($this->getReference('color_5'));
        $colorFamily->addColor($this->getReference('color_9'));
        $colorFamily->addColor($this->getReference('color_16'));
        $colorFamily->addColor($this->getReference('color_18'));
        $colorFamily->addColor($this->getReference('color_28'));
        $colorFamily->addColor($this->getReference('color_44'));
        $colorFamily->addColor($this->getReference('color_47'));
        $colorFamily->addColor($this->getReference('color_51'));
        $colorFamily->addColor($this->getReference('color_58'));
        $colorFamily->addColor($this->getReference('color_65'));
        $colorFamily->addColor($this->getReference('color_67'));
        $colorFamily->addColor($this->getReference('color_69'));
        $colorFamily->addColor($this->getReference('color_73'));
        $colorFamily->addColor($this->getReference('color_75'));
        $colorFamily->addColor($this->getReference('color_77'));
        $colorFamily->addColor($this->getReference('color_79'));
        $colorFamily->addColor($this->getReference('color_83'));
        $colorFamily->addColor($this->getReference('color_85'));
        $colorFamily->addColor($this->getReference('color_91'));
        $colorFamily->addColor($this->getReference('color_93'));
        $colorFamily->addColor($this->getReference('color_95'));
        $colorFamily->addColor($this->getReference('color_95'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_DARK, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Green');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_9'));
        $colorFamily->addColor($this->getReference('color_35'));
        $colorFamily->addColor($this->getReference('color_41'));
        $colorFamily->addColor($this->getReference('color_55'));
        $colorFamily->addColor($this->getReference('color_61'));
        $colorFamily->addColor($this->getReference('color_62'));
        $colorFamily->addColor($this->getReference('color_63'));
        $colorFamily->addColor($this->getReference('color_64'));
        $colorFamily->addColor($this->getReference('color_72'));
        $colorFamily->addColor($this->getReference('color_79'));
        $colorFamily->addColor($this->getReference('color_81'));
        $colorFamily->addColor($this->getReference('color_86'));
        $colorFamily->addColor($this->getReference('color_93'));
        $colorFamily->addColor($this->getReference('color_95'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_GREEN, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Grey');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_3'));
        $colorFamily->addColor($this->getReference('color_12'));
        $colorFamily->addColor($this->getReference('color_30'));
        $colorFamily->addColor($this->getReference('color_82'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_GREY, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Neutral');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_11'));
        $colorFamily->addColor($this->getReference('color_14'));
        $colorFamily->addColor($this->getReference('color_19'));
        $colorFamily->addColor($this->getReference('color_20'));
        $colorFamily->addColor($this->getReference('color_21'));
        $colorFamily->addColor($this->getReference('color_22'));
        $colorFamily->addColor($this->getReference('color_23'));
        $colorFamily->addColor($this->getReference('color_24'));
        $colorFamily->addColor($this->getReference('color_25'));
        $colorFamily->addColor($this->getReference('color_26'));
        $colorFamily->addColor($this->getReference('color_27'));
        $colorFamily->addColor($this->getReference('color_32'));
        $colorFamily->addColor($this->getReference('color_36'));
        $colorFamily->addColor($this->getReference('color_37'));
        $colorFamily->addColor($this->getReference('color_38'));
        $colorFamily->addColor($this->getReference('color_39'));
        $colorFamily->addColor($this->getReference('color_43'));
        $colorFamily->addColor($this->getReference('color_50'));
        $colorFamily->addColor($this->getReference('color_56'));
        $colorFamily->addColor($this->getReference('color_78'));
        $colorFamily->addColor($this->getReference('color_88'));
        $colorFamily->addColor($this->getReference('color_89'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_NEUTRAL, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Orange');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_34'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_ORANGE, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Red-Pink');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_17'));
        $colorFamily->addColor($this->getReference('color_29'));
        $colorFamily->addColor($this->getReference('color_33'));
        $colorFamily->addColor($this->getReference('color_51'));
        $colorFamily->addColor($this->getReference('color_65'));
        $colorFamily->addColor($this->getReference('color_67'));
        $colorFamily->addColor($this->getReference('color_73'));
        $colorFamily->addColor($this->getReference('color_83'));
        $colorFamily->addColor($this->getReference('color_87'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_RED, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('White');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_2'));
        $colorFamily->addColor($this->getReference('color_7'));
        $colorFamily->addColor($this->getReference('color_8'));
        $colorFamily->addColor($this->getReference('color_25'));
        $colorFamily->addColor($this->getReference('color_57'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_WHITE, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Yellow');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $colorFamily->addColor($this->getReference('color_13'));
        $colorFamily->addColor($this->getReference('color_15'));
        $colorFamily->addColor($this->getReference('color_31'));
        $colorFamily->addColor($this->getReference('color_40'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_YELLOW, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Basic');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $colorFamily->addColor($this->getReference('color_B1'));
        $colorFamily->addColor($this->getReference('color_3'));
        $colorFamily->addColor($this->getReference('color_4'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_BASIC, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('City');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $colorFamily->addColor($this->getReference('color_5'));
        $colorFamily->addColor($this->getReference('color_9'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_CITY, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Village');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $colorFamily->addColor($this->getReference('color_11'));
        $colorFamily->addColor($this->getReference('color_12'));
        $colorFamily->addColor($this->getReference('color_14'));
        $colorFamily->addColor($this->getReference('color_16'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_VILLAGE, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Time');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $colorFamily->addColor($this->getReference('color_18'));
        $colorFamily->addColor($this->getReference('color_19'));
        $colorFamily->addColor($this->getReference('color_20'));
        $colorFamily->addColor($this->getReference('color_21'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_TIME, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Coast');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $colorFamily->addColor($this->getReference('color_22'));
        $colorFamily->addColor($this->getReference('color_23'));
        $colorFamily->addColor($this->getReference('color_24'));
        $colorFamily->addColor($this->getReference('color_26'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_COAST, $colorFamily);

        $colorFamily = new ColorFamily();
        $colorFamily->setActive(true);
        $colorFamily->setText('Painted floor');
        $colorFamily->setCreatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setUpdatedAt(new \DateTimeImmutable('now'));
        $colorFamily->setCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $colorFamily->addColor($this->getReference('color_27'));
        $colorFamily->addColor($this->getReference('color_28'));
        $colorFamily->addColor($this->getReference('color_29'));
        $colorFamily->addColor($this->getReference('color_30'));
        $manager->persist($colorFamily);
        $this->addReference(self::COLOR_FAMILY_PAINTEDFLOOR, $colorFamily);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            ColorFixtures::class,
        ];
    }
}
