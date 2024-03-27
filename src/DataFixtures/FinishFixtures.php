<?php

namespace App\DataFixtures;

use App\Entity\Finish;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FinishFixtures extends Fixture
{
    public const FINISH_MAT = 'finish_mat';
    public const FINISH_SATIN = 'finish_satin';

    public function load(ObjectManager $manager): void
    {
        $finish = new Finish();
        $finish->setCreatedAt(new \DateTimeImmutable('now'));
        $finish->setUpdatedAt(new \DateTimeImmutable('now'));
        $manager->persist($finish);
        $this->addReference(self::FINISH_MAT, $finish);

        $finish = new Finish();
        $finish->setCreatedAt(new \DateTimeImmutable('now'));
        $finish->setUpdatedAt(new \DateTimeImmutable('now'));
        $manager->persist($finish);
        $this->addReference(self::FINISH_SATIN, $finish);
        

        $manager->flush();
    }
}
