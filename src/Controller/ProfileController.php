<?php

namespace App\Controller;

use App\Controller\ProfileController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class ProfileController extends AbstractController
{
    /**
     
     * @Route("/profile", name="app_profile")
     */


    public function index(): Response
    {            
       
        return $this->render('profile/index.html.twig'); 
            // ['controller_name' => 'ProfileController',]

    }
    
    
}
