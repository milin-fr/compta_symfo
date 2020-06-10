<?php

namespace App\DataFixtures;

use App\Entity\WorkType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $workTypeTitles = ["Plombrie", "Electricité", "Chauffage", "Jardin"];
        $workTypes = [];

        foreach($workTypeTitles as $title){
            $workType = new WorkType();
            $workType->setTitle($title);
            $workType->setBudgetEuro(random_int(10000 , 50000));
            $workType->setBudgetCent(random_int(0 , 99));
            $manager->persist($workType);
        }


        $manager->flush();
    }
}
