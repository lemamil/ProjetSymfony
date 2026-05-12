<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response 
    {
        return $this->render('home/index.html.twig', [
            'title' => 'Projet Symfony'
        ]);
    }

    #[Route('/home/index', name: 'app_home_index', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $ticket = new Ticket();
        $form = $this->createForm(FormType::class, $ticket);

        $form->handleRequest($request);
        
        return $this->render('home/index.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }
}
