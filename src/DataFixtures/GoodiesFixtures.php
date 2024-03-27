<?php

namespace App\DataFixtures;

use App\Entity\Goodies;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GoodiesFixtures extends Fixture implements DependentFixtureInterface
{

    public const GOODIES_PIN = 'goodies_pin';
    public const GOODIES_HAT = 'goodies_hat';
    public const GOODIES_CALENDAR = 'goodies_calendar';
    public const GOODIES_MUG = 'goodies_mug';
    public const GOODIES_NOTEBOOK = 'goodies_notebook';
    public const GOODIES_T_SHIRT = 'goodies_t_shirt';
    public const GOODIES_SWEET_SHIRT = 'goodies_sweet_shirt';
    public const GOODIES_JAR = 'goodies_jar';
    public const GOODIES_TOTE_BAG = 'goodies_tote_bag';

    public function load(ObjectManager $manager): void
    {
        $goodies = new Goodies();
        $goodies->setPrice(5);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Pin_Button_Mockup_4.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_PIN, $goodies);

        
        $goodies = new Goodies();
        $goodies->setPrice(22);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Free_Baseball_Cap_Mockup_3_2.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_HAT, $goodies);


        $goodies = new Goodies();
        $goodies->setPrice(11);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Free_A5_Desk_Calendar_Mockup_1.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_CALENDAR, $goodies);


        $goodies = new Goodies();
        $goodies->setPrice(16);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Free_Mug_Mockup_1_2.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_MUG, $goodies);


        $goodies = new Goodies();
        $goodies->setPrice(13);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Free_Notebook_Mockup_1.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_NOTEBOOK, $goodies);


        $goodies = new Goodies();
        $goodies->setPrice(29);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Weck_Jar_Mockup.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_JAR, $goodies);


        $goodies = new Goodies();
        $goodies->setPrice(45);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Free_Sweatshirt_Mockup_1.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_SWEET_SHIRT, $goodies);


        $goodies = new Goodies();
        $goodies->setPrice(20);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Hanging_Tote_Bag_Mockup_1.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_TOTE_BAG, $goodies);


        $goodies = new Goodies();
        $goodies->setPrice(35);
        $goodies->setCreatedAt(new \DateTimeImmutable('now'));
        $goodies->setUpdatedAt(new \DateTimeImmutable('now'));
        $goodies->setImageName('Free_T-Shirt_Mockup_1.jpg');
        $goodies->setCategory($this->getReference(CategoryFixtures::CATEGORY_GOODIES));
        $manager->persist($goodies);
        $this->addReference(self::GOODIES_T_SHIRT, $goodies);



        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
