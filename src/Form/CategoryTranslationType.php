<?php

namespace App\Form;

use App\Entity\CategoryTranslation;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class CategoryTranslationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('text', TextType::class)
            ->add('imageFile', FileType::class, ["required"=>$options["edition"], "help"=>"back.labels.image_help"])
            ->add('videoFile', FileType::class, ["required"=>false])
            ->add('description', CKEditorType::class)
            ->add('locale', HiddenType::class)
            ->add('slug', SlugType::class,  ["required"=>$options["edition"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CategoryTranslation::class,
            'edition'=>true,
        ]);
    }
}
