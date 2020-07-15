<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Repository\BillRepository;
use App\Repository\CompanyRepository;
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
    public function home(CompanyRepository $companyRepository, BillRepository $billRepository): Response
    {
        $sumPerCompany = [];
        foreach($companyRepository->findAll() as $company){
            $company->sum = 123;
        };

        return $this->render('main/home.html.twig', [
            'companies' => $companyRepository->findAll(),
        ]);
    }
}
