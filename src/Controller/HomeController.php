<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/form', name: 'form')]
    public function new(): Response
    {
        $ticket = new Ticket();
        $form = $this->createForm(FormType::class, $ticket);
        
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
