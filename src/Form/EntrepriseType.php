<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label'=>'Nom du partenaire',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Saisissez le nom de l\'entreprise'
                ]
            ])
            ->add('numeroVoie',TextType::class,[
                'label'=>'Numéro de voie',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Saisissez le numéro de voie'
                ]
            ])
            ->add('nomVoie', TextType::class,[
                'label'=>'Nom de la voie',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Saisissez la voie'
                ]
            ])
            ->add('cp', TextType::class,[
                'label'=>'Code postal du siège social',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Saisissez le code postal'
                ]
            ])
            ->add('ville', TextType::class,[
                'label'=>'Ville du siège social',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Saisissez la ville'
                ]
            ])
            ->add('date', DateType::class)
            ->add('valider', SubmitType::class
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
