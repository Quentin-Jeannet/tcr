<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    
    // ====================================================== //
    // ===================== CONST ===================== //
    // ====================================================== //
    public const ADMIN_CHRISTIAN = 'admin-christian';
    public const ADMIN_QUENTIN = 'admin-quentin';
    public const ADMIN_FRED = 'admin-fred';
    public const ADMIN_CHRISTOPHER = 'admin-charlie';
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $encoder;
    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->encoder = $userPasswordHasherInterface;
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        // CHRISTIAN
        $user = new User();

        $user->setName('meneux');
        $user->setFirstname('christian');
        $user->setEmail('cmeneux@graphikchannel.com');
        $user->setRoles(['ROLE_ADMIN', 'ROLE_SUPERADMIN']);
        $user->setIsVerified(true);
        // Gestion du mot de passe
        $plainPassword = "pass"; // le mot de passe en clair que l'on veut encoder
        $encodedPassword = $this->encoder->hashPassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        // Mémorisation
        $manager->persist($user);
        $this->addReference(self::ADMIN_CHRISTIAN, $user);

        // QUENTIN
        $user = new User();

        $user->setName('jeannet');
        $user->setFirstname('quentin');
        $user->setEmail('quentin@graphikchannel.com');
        $user->setRoles(['ROLE_ADMIN', 'ROLE_SUPERADMIN']);
        $user->setIsVerified(true);
        // Gestion du mot de passe
        $plainPassword = "pass"; // le mot de passe en clair que l'on veut encoder
        $encodedPassword = $this->encoder->hashPassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        // Mémorisation
        $manager->persist($user);
        $this->addReference(self::ADMIN_QUENTIN, $user);
        
        // FRED
        $user = new User();

        $user->setName('parfum');
        $user->setFirstname('frederic');
        $user->setEmail('fparfum@lgo-conseil.fr');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setIsVerified(true);
        // Gestion du mot de passe
        $plainPassword = "pass"; // le mot de passe en clair que l'on veut encoder
        $encodedPassword = $this->encoder->hashPassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        // Mémorisation
        $manager->persist($user);
        $this->addReference(self::ADMIN_FRED, $user);
        
        // CHRISTOPHER
        $user = new User();

        $user->setName('edwards');
        $user->setFirstname('christopher');
        $user->setEmail('christopher.edwards@telenet.be');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setIsVerified(true);
        // Gestion du mot de passe
        $plainPassword = "pass"; // le mot de passe en clair que l'on veut encoder
        $encodedPassword = $this->encoder->hashPassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        // Mémorisation
        $manager->persist($user);
        $this->addReference(self::ADMIN_CHRISTOPHER, $user);

        $manager->flush();
    }
}
