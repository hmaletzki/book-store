<?php

namespace App\DataFixtures;

use App\Entity\Security\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BookStoreUserFixtures extends Fixture
{
    private $encoder;

    /**
     * BookStoreUserFixtures constructor.
     * @param $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $user = new User();
        $password = $this->encoder->encodePassword($user, 'user');
        $user->setUsername('user')
            ->setEmail('test@user.de')
            ->setPassword($password)
            ->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $admin = new User();
        $password = $this->encoder->encodePassword($admin, 'admin');
        $admin->setUsername('admin')
            ->setEmail('admin@user.de')
            ->setPassword($password)
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $manager->flush();
    }
}
