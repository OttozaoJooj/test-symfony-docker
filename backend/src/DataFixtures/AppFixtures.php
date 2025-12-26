<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new Users();
        
        $user->setName('otto');        
        $user->setAge(21);

        $manager->persist($user);


        $user = new Users();
        $user->setName('erick');        
        $user->setAge(24);
        $manager->persist($user);

        
        $user = new Users();
        $user->setName('mendes');        
        $user->setAge(60);

        $manager->persist($user);

        $user = new Users();
        $user->setName('maria');    
        $user->setAge(50);
        $manager->persist($user);

        $user = new Users();
        $user->setName('fulano'); 
        $user->setAge(60);
        $manager->persist($user);

        $manager->flush();
    }
}
