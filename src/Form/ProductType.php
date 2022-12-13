<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\IntegerType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note',IntegerType::class,[
                'label'=>'Note du produit',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Evaluer le produit'
                ]
            ])
            ->add('commentaire', TextType::class,[
                'label'=>'Commentaire',
                'required'=>false,
                'placeholder'=>'Commenter le produit'

            ])
            ->add('date', DateType::class,[
                'label'=>'Date du dépôt',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Date de l\'avis'
                ]
            ])
            ->add('utilisateur', TextareaType::class,[
                'label'=>'Utilisateur',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>''
                ]
            ])
            ->add('picture', FileType::class,[
                'label'=>'Photo',
                'required'=>false,
                'constraints'=>[
                    new File([
                       'mimeTypes'=>[
                           "image/png",
                           "image/jpg",
                           "image/jpeg",
                           'image/gif',
                           'image/jfif',
                           'image/webp'
                       ],
                        'mimeTypesMessage'=>'Format non géré'
                    ])
                ]
            ])
            ->add('enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
