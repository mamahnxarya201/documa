<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Totp\TotpAuthenticator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    private TotpAuthenticator $authenticator;

    public function __construct(UserPasswordHasherInterface $passwordHasher, TotpAuthenticator $authenticator)
    {
        $this->hasher = $passwordHasher;
        $this->authenticator = $authenticator;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $password = $this->hasher->hashPassword($user, '123');
        $user->setUsername('admin');
        $user->setPassword($password);
        $user->setRoles(['ROLE_ADMIN']);
        $user->setTotpSecret($this->authenticator->generateSecret());

        $manager->persist($user);
        $manager->flush();
    }
}
