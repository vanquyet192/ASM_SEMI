<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_indexadmin')]
    public function index(): Response
    {
        // Check if the user has the 'ROLE_ADMIN' role
        if ($this->isGranted('ROLE_ADMIN')) {
            // If the user has the 'ROLE_ADMIN' role, render the error page
            return $this->render('admin/index.html.twig', [
                'controller_name' => 'ErrorController',
            ]);
        } else {
            // If not, redirect to the home page
            return $this->redirectToRoute('app_error');
        }
    }
}
