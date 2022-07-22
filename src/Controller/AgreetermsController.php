<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgreetermsController extends AbstractController
{
    /**
     * @Route("/agreeterms", name="app_agreeterms")
     */
    public function index(): Response
    {
        return $this->render('agreeterms/index.html.twig', [
            'controller_name' => 'AgreetermsController',
        ]);
    }
}
