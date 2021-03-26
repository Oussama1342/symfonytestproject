<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonprofilController extends AbstractController
{
    /**
     * @Route("/monprofil", name="monprofil")
     */
    public function index(): Response
    {
        return $this->render('monprofil/index.html.twig', [
            'controller_name' => 'MonprofilController',
        ]);
    }

    public function updateUser(){
    app_user.setEmail(app_user.getEmail);
    app_user.setUsername(app_user.getUsername);

}
}
