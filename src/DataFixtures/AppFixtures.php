<?php

namespace App\DataFixtures;

use App\Entity\Ticket;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

    
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $categories = ['Incident', 'Panne',  'Evolution',  'Anomalie', 'Information' ];
        foreach ($categories as $ticket)
        
        $status = ['Nouveau', 'Ouvert', 'Résolu', 'Fermé'];
        foreach ($status as $ticket)
        
        for ($i = 0; $i < 10; $i++) {
        $ticket = new Ticket();
        $ticket ->setEmail($faker->email);
        $ticket ->setDateOuverture($faker->dateTime());
        $ticket ->setDateCloture($faker->dateTime());
        $ticket ->setDescription($faker->paragraph);
        $ticket->setCategorie($faker->randomElement($categories));
        $ticket ->setStatut($faker->randomElement($status));
        $ticket ->setResponsable('Admin');
        $manager->persist($ticket);
        }
        $manager->flush();
    }
}   
    


