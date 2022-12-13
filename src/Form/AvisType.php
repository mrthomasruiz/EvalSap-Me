<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note', ChoiceType::class, [
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4'=>4,
                    '5'=>5
                ],
                'label'=>'Note du produit ',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Saisissez la note du produit'
            ]])

            ->add('commentaire',TextAreaType::class,[
                'label'=>'Commentaire du produit ',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Commentez le produit'
                ]
            ])
            ->add('enregistrer', SubmitType::class)

            ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
