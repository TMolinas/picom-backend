<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppControlerController extends AbstractController
{
    /**
     * @Route("/app/controler", name="app_controler")
     */
    public function index(): Response
    {
        return $this->render('app_controler/index.html.twig', [
            'controller_name' => 'AppControlerController',
        ]);
    }
}
