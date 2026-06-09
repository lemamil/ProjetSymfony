<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\FormType;
use App\Repository\TicketRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TicketController extends AbstractController
{
    #[Route('/ticket', name: 'app_ticket')]
    public function index(TicketRepository $repository): Response
    {
        $tickets=$repository->findAll();
        return $this->render('ticket/listeTickets.html.twig', [
            'tickets' => $tickets
        ]);
    }

    public function addTicket(Request $request, EntityManagerInterface $manager)
    {

        $ticket=new Ticket();
        $form=$this->createForm(FormType::class, $ticket);
        dump($ticket);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($ticket);
            $manager->flush();
            $this->addFlash("success","Le ticket a bien été crée" );
            return $this->redirectToRoute('app_ticket');
        }
        
        return $this->render('admin/ajout.html.twig', [
            'formulaire' => $form
        ]);
    }

}