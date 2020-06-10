<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Status;
use App\Entity\WorkType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $workTypeTitles = ["Plombrie", "Electricité", "Chauffage", "Jardin"];
        $workTypes = [];

        foreach($workTypeTitles as $title){
            $workType = new WorkType();
            $workType->setTitle($title);
            $workType->setBudgetEuro(random_int(10000 , 50000));
            $workType->setBudgetCent(random_int(0 , 99));
            $manager->persist($workType);
            $workTypes[] = $workType;
        }

        $companyTitles = ["artisan-plombier", "artisan-electricien", "artisan-chauffagist", "artisan-jardinier"];
        $companys = [];
        foreach($companyTitles as $title){
            $company = new Company();
            $company->setTitle($title);
            $company->setEmail($title . "gmail.com");
            $company->setPhoneNumber(random_int(1000000000 , 9999999999));
            $company->setPointOfContact("Chef d'equipe");
            $manager->persist($company);
            $companys[] = $company;
        }

        $billStatusTitles = ["Devis", "Facturé"];
        $billStatuses = [];
        foreach($billStatusTitles as $title){
            $status = new Status();
            $status->setTitle($title);
            $manager->persist($status);
            $billStatuses[] = $status;
        }

        $status = new Status();
        $status->setTitle("Annulé");
        $status->setDeductable(0);
        $manager->persist($status);
        $billStatuses[] = $status;

        
        $manager->flush();
    }
}
