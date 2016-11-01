<?php

namespace ExampleBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ExampleBundle\Entity\User;
use Faker\Factory;

class LoadUserData implements FixtureInterface
{
    const NUMBER_OF_USERS = 300;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($counter =  0; $counter <= self::NUMBER_OF_USERS; $counter++) {
            $user = new User();
            $user->setFirstName($faker->firstName());
            $user->setLastName($faker->lastName());
            $user->setEmail($faker->email());
            $user->setCreatedAt($faker->dateTimeBetween('-3 years', 'now'));
            $manager->persist($user);
            $manager->flush();
        }
    }
}