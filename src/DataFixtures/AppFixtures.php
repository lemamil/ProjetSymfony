<?php

namespace App\DataFixtures;

use App\Entity\Ticket;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ticket = (new Ticket());
        $ticket ->setEmail('user@site.com')
                ->setDateOuverture()
                ->setDateCloture()
                ->setDescription('')
                ->setCategorie('Information')
                ->setStatut('Nouveau')
                ->setResponsable('Admin');

        $manager->flush();
    }
}
