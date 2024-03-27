<?php

namespace App\DataFixtures;

use App\Entity\FinishTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FinishTranslationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $finishTranslation = new FinishTranslation();
        $finishTranslation->setText('Mast');
        $finishTranslation->setLocale('en');
        $finishTranslation->setFinish($this->getReference(FinishFixtures::FINISH_MAT));
        $manager->persist($finishTranslation);

        $finishTranslation = new FinishTranslation();
        $finishTranslation->setText('Mat');
        $finishTranslation->setLocale('fr');
        $finishTranslation->setFinish($this->getReference(FinishFixtures::FINISH_MAT));
        $manager->persist($finishTranslation);

        $finishTranslation = new FinishTranslation();
        $finishTranslation->setText('Mast');
        $finishTranslation->setLocale('nl');
        $finishTranslation->setFinish($this->getReference(FinishFixtures::FINISH_MAT));
        $manager->persist($finishTranslation);

        $finishTranslation = new FinishTranslation();
        $finishTranslation->setText('Satin');
        $finishTranslation->setLocale('en');
        $finishTranslation->setFinish($this->getReference(FinishFixtures::FINISH_SATIN));
        $manager->persist($finishTranslation);

        $finishTranslation = new FinishTranslation();
        $finishTranslation->setText('Satin');
        $finishTranslation->setLocale('fr');
        $finishTranslation->setFinish($this->getReference(FinishFixtures::FINISH_SATIN));
        $manager->persist($finishTranslation);

        $finishTranslation = new FinishTranslation();
        $finishTranslation->setText('Satijn');
        $finishTranslation->setLocale('nl');
        $finishTranslation->setFinish($this->getReference(FinishFixtures::FINISH_SATIN));
        $manager->persist($finishTranslation);
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            FinishFixtures::class,
        ];
    }
}
