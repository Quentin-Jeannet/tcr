<?php

namespace App\DataFixtures;

use App\Entity\SubCategory;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SubCategoryFixtures extends Fixture implements DependentFixtureInterface
{

    public const SUB_CATEGORY_1 = 'sub_category_1';
    public const SUB_CATEGORY_2 = 'sub_category_2';
    public const SUB_CATEGORY_3 = 'sub_category_3';
    public const SUB_CATEGORY_4 = 'sub_category_4';
    public const SUB_CATEGORY_5 = 'sub_category_5';
    public const SUB_CATEGORY_6 = 'sub_category_6';
    public const SUB_CATEGORY_7 = 'sub_category_7';
    public const SUB_CATEGORY_8 = 'sub_category_8';
    public const SUB_CATEGORY_9 = 'sub_category_9';
    public const SUB_CATEGORY_10 = 'sub_category_10';
    public const SUB_CATEGORY_11 = 'sub_category_11';
    public const SUB_CATEGORY_12 = 'sub_category_12';
    public const SUB_CATEGORY_13 = 'sub_category_13';
    public const SUB_CATEGORY_14 = 'sub_category_14';
    public const SUB_CATEGORY_15 = 'sub_category_15';
    public const SUB_CATEGORY_16 = 'sub_category_16';


    public function load(ObjectManager $manager): void
    {
        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());
        $subCategory->setRankOrder(1);
        $subCategory->setImageName('paint-sub-menu1.jpg');
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_1, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());
        $subCategory->setRankOrder(2);
        $subCategory->setImageName('paint-sub-menu2.jpg');
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_2, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());
        $subCategory->setRankOrder(3);
        $subCategory->setImageName('surface1-3.jpg');
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_WALL));
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_3, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());
        $subCategory->setRankOrder(4);
        $subCategory->setImageName('paint-sub-menu3.jpg');
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_PAINT));
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_WALL));
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_4, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());
        $subCategory->setRankOrder(5);
        $subCategory->setImageName('material2-1.jpg');
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_WALL));
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_5, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());
        $subCategory->setRankOrder(6);
        $subCategory->setImageName('menu-maintenance.jpg');
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_WALL));
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_6, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());
        $subCategory->setRankOrder(7);
        $subCategory->setImageName('menu-dimensions.jpg');
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_7, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());
        $subCategory->setRankOrder(8);
        $subCategory->setImageName('fidbox-electronic.jpg');
        $subCategory->addCategory($this->getReference(CategoryFixtures::CATEGORY_FLOORING));
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_8, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());;
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_9, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());;
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_10, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());;
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_11, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());;
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_12, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());;
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_13, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());;
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_14, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());;
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_15, $subCategory);

        $subCategory = new SubCategory();
        $subCategory->setCreatedAt(new \DateTimeImmutable());
        $subCategory->setUpdatedAt(new \DateTimeImmutable());;
        $manager->persist($subCategory);
        $this->addReference(self::SUB_CATEGORY_16, $subCategory);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
