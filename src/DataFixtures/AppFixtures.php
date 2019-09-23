<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Users;
use App\Entity\Questions;
use App\Entity\Answers;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

            for ($i = 0; $i < 10; $i++) {
                $users = new Users;
                $questions = new Questions;
                $answers = new Answers;

                $users->setName($faker->name);
                
                $questions->setTitle($faker->title);
                $questions->setContent($faker->text);

                $answers->setContent($faker->text);
                $answers->setStatus($faker->boolean($chanceOfGettingTrue = 50));
                
                $manager->persist($users);
                $manager->persist($questions);
                $manager->persist($answers);
            }

        $manager->flush();
    }
}





