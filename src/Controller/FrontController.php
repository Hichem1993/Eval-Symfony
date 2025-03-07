<?php

namespace App\Controller;

use App\Repository\EmployeRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FrontController extends AbstractController{
    #[Route('/', name: 'app_home')]
    public function index(ServiceRepository $ServiceRepository, EmployeRepository $EmployeRepository): Response
    {
        $services = $ServiceRepository->findAll();
        $employees =  $EmployeRepository->findAll();
        return $this->render('front/index.html.twig', [
            "services" => $services,
            "employees" => $employees
        ]);
    }
}
