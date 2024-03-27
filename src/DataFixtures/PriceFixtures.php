<?php

namespace App\DataFixtures;

use App\Entity\Price;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PriceFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $price = new Price();
        $price->setPrice(5.9);
        $price->setLitre('0.125');
        $price->setMesure('mL');
        $price->setQuantity(125);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_MAT));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(19.9);
        $price->setLitre('1');
        $price->setMesure('L');
        $price->setQuantity(1);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_MAT));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(45.9);
        $price->setLitre('2.5');
        $price->setMesure('L');
        $price->setQuantity(2.5);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_MAT));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(75.9);
        $price->setLitre('5');
        $price->setMesure('L');
        $price->setQuantity(5);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_MAT));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(109.9);
        $price->setLitre('20');
        $price->setMesure('L');
        $price->setQuantity(20);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_MAT));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(6.3);
        $price->setLitre('0.125');
        $price->setMesure('mL');
        $price->setQuantity(125);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_SATIN));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(20.9);
        $price->setLitre('1');
        $price->setMesure('L');
        $price->setQuantity(1);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_SATIN));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(48.5);
        $price->setLitre('2.5');
        $price->setMesure('L');
        $price->setQuantity(2.5);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_SATIN));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(80.9);
        $price->setLitre('5');
        $price->setMesure('L');
        $price->setQuantity(5);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_SATIN));
        $manager->persist($price);

        $price = new Price();
        $price->setPrice(129.9);
        $price->setLitre('20');
        $price->setMesure('L');
        $price->setQuantity(20);
        $price->setFinish($this->getReference(FinishFixtures::FINISH_SATIN));
        $manager->persist($price);




        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            FinishFixtures::class,
        );
    }
}
