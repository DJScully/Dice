<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiceController extends AbstractController
{
    #[Route('/dice', name: 'dice')]
    public function index(): Response
    {
        return $this->render('dice/index.html.twig', [
            'controller_name' => 'DiceController',
        ]);
    }
}
