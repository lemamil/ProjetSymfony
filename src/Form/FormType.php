<?php

namespace App\Form;

use App\Entity\Ticket;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class)
            ->add('description', TextType::class)
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'Incident' => 'Incident',
                    'Panne' => 'Panne',
                    'Evolution' => 'Evolution',
                    'Anomalie' => 'Anomalie',
                    'Information' => 'Information',
                ]
            ])
            ->add('dateOuverture', DateType::class)
            ->add('dateCloture', DateType::class)
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Nouveau' => 'Nouveau',
                    'Ouvert' => 'Ouvert',
                    'Résolu' => 'Résolu',
                    'Fermé' => 'Fermé',
                ]
            ])
            ->add('responsable', TextType::class)
            -> getForm();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
