<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\FormType;
use Symfony\Component\Form\FormTypeInterface;
use Doctrine\DBAL\Types\DateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
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
            return $this->redirectToRoute('liste_tickets');
        }
        
        return $this->render('admin/ajout.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/ticket/modif/{id}", name: "ticket", methodes={"GET","MOST"})
     */
    public function modifTicket(Ticket $ticket, Request $request, EntityManagerInterface $manager)
    {
        $form=$this->createForm(FormType::class, $ticket);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($ticket);
            $manager->flush();
            $this->addFlash("success","Le ticket a bien été modifié" );
            return $this->redirectToRoute('liste_tickets');
        }
        
        return $this->render('admin/modif.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }
}
