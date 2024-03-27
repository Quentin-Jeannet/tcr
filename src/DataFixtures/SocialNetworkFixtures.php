<?php

namespace App\DataFixtures;

use App\Entity\SocialNetwork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SocialNetworkFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $socialNetwork = new SocialNetwork();
        $socialNetwork->setName('Facebook');
        $socialNetwork->setClasses('fa-brands fa-facebook');
        $socialNetwork->setLink('https://www.facebook.com/');
        $socialNetwork->setIsActive(true);
        $manager->persist($socialNetwork);

        $socialNetwork = new SocialNetwork();
        $socialNetwork->setName('Twitter');
        $socialNetwork->setClasses('fa-brands fa-twitter');
        $socialNetwork->setLink('https://www.twitter.com/');
        $socialNetwork->setIsActive(true);
        $manager->persist($socialNetwork);

        $socialNetwork = new SocialNetwork();
        $socialNetwork->setName('Instagram');
        $socialNetwork->setClasses('fa-brands fa-instagram');
        $socialNetwork->setLink('https://www.instagram.com/');
        $socialNetwork->setIsActive(true);
        $manager->persist($socialNetwork);

        $socialNetwork = new SocialNetwork();
        $socialNetwork->setName('Youtube');
        $socialNetwork->setClasses('fa-brands fa-youtube');
        $socialNetwork->setLink('https://www.youtube.com/');
        $socialNetwork->setIsActive(true);
        $manager->persist($socialNetwork);

        $manager->flush();
    }
}
