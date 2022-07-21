<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class VacancierProfileController extends AbstractController
{
    /**
     * @Route("/vacancier/profile", name="app_vacancier_profile")
     */
    public function index(): Response
    {            
       
        return $this->render('vacancier_profile/index.html.twig'); 
            // ['controller_name' => 'VacancierProfileController',]

    }
    
    
    // $user->setRoles(['ROLES_VACANCIER']);
}
