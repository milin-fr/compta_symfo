<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Repository\BillRepository;
use App\Repository\CompanyRepository;
use App\Repository\WorkTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class MainController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function home(CompanyRepository $companyRepository, WorkTypeRepository $workTypeRepository): Response
    {
        $companies = [];
        foreach($companyRepository->findAll() as $company){
            $euroSum = 0;
            $centSum = 0;
            foreach($company->getBills() as $bill){
                if($bill->getStatus()->getDeductable() == 1){
                    $euroSum += $bill->getPriceEuro();
                    $centSum += $bill->getPriceCent();
                }
            }
            $euroSum += intdiv($centSum, 100);
            $centSum = $centSum % 100;
            $company->euroSum = $euroSum;
            $company->centSum = $centSum;
            $companies[] = $company;
        };

        $workTypes = [];
        foreach($workTypeRepository->findAll() as $workType){
            $euroSum = 0;
            $centSum = 0;
            foreach($workType->getBills() as $bill){
                $euroSum += $bill->getPriceEuro();
                $centSum += $bill->getPriceCent();
            }
            $euroSum += intdiv($centSum, 100);
            $centSum = $centSum % 100;
            $workType->euroSum = $euroSum;
            $workType->centSum = $centSum;
            $workTypes[] = $workType;
        };

        return $this->render('main/home.html.twig', [
            'companies' => $companies,
            'workTypes' => $workTypes
        ]);
    }
}
