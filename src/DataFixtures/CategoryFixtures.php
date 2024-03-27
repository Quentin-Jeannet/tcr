<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

    


class CategoryFixtures extends Fixture
{

    public const CATEGORY_HOME = 'category_home';
    public const CATEGORY_PAINT = 'category_paint';
    public const CATEGORY_FLOORING = 'category_flooring';
    public const CATEGORY_WALL = 'category_wall';
    public const CATEGORY_GOODIES = 'category_goodies';
    public const CATEGORY_CONFIGURATOR = 'category_configurator';
    public const CATEGORY_CONTACT = 'category_contact';



    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setCreatedAt(new \DateTimeImmutable('now'));
        $category->setUpdatedAt(new \DateTimeImmutable('now'));
        $category->setRank(1);
        $category->setImmutableSlug('home');
        $manager->persist($category);
        $this->addReference(self::CATEGORY_HOME, $category);

        
        $category = new Category();
        $category->setCreatedAt(new \DateTimeImmutable('now'));
        $category->setUpdatedAt(new \DateTimeImmutable('now'));
        $category->setRank(2);
        $category->setImmutableSlug('paint');
        $manager->persist($category);
        $this->addReference(self::CATEGORY_PAINT, $category);

        $category = new Category();
        $category->setCreatedAt(new \DateTimeImmutable('now'));
        $category->setUpdatedAt(new \DateTimeImmutable('now'));
        $category->setRank(3);
        $category->setImmutableSlug('flooring');
        $manager->persist($category);
        $this->addReference(self::CATEGORY_FLOORING, $category);

        $category = new Category();
        $category->setCreatedAt(new \DateTimeImmutable('now'));
        $category->setUpdatedAt(new \DateTimeImmutable('now'));
        $category->setRank(4);
        $category->setImmutableSlug('wall');
        $manager->persist($category);
        $this->addReference(self::CATEGORY_WALL, $category);

        $category = new Category();
        $category->setCreatedAt(new \DateTimeImmutable('now'));
        $category->setUpdatedAt(new \DateTimeImmutable('now'));
        $category->setRank(5);
        $category->setImmutableSlug('goodies');
        $manager->persist($category);
        $this->addReference(self::CATEGORY_GOODIES, $category);

        $category = new Category();
        $category->setCreatedAt(new \DateTimeImmutable('now'));
        $category->setUpdatedAt(new \DateTimeImmutable('now'));
        $category->setRank(6);
        $category->setImmutableSlug('configurator');
        $manager->persist($category);
        $this->addReference(self::CATEGORY_CONFIGURATOR, $category);

        $category = new Category();
        $category->setCreatedAt(new \DateTimeImmutable('now'));
        $category->setUpdatedAt(new \DateTimeImmutable('now'));
        $category->setRank(7);
        $category->setImmutableSlug('contact');
        $manager->persist($category);
        $this->addReference(self::CATEGORY_CONTACT, $category);


        $manager->flush();
    }
}
