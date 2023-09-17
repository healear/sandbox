<?php

namespace App\DataFixtures;

use App\Domain\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixture extends Fixture
{
    public function __construct(
      private UserPasswordHasherInterface $hasher,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setName('admin');
        $admin->setEmail('admin@example.com');

        $encodedPassword = $this->hasher->hashPassword($admin, 'admin_password');
        $admin->setPassword($encodedPassword);

        $admin->setRoles(['ROLE_USER', 'ROLE_ADMIN']);

        $manager->persist($admin);

        $user = new User();
        $user->setName('user');
        $user->setEmail('user@example.com');

        $encodedPassword = $this->hasher->hashPassword($user, 'password');
        $user->setPassword($encodedPassword);

        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);

        $manager->flush();
    }
}
