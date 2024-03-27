<?php

namespace App\Form;

use App\Form\SlugType;
use App\Entity\SubCategoryTranslation;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SubCategoryTranslationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', TextType::class, [
                'label' => 'back.labels.name',
                'required' => true
                ])
            ->add('description', CKEditorType::class, [
                'label' => 'back.labels.description',
                'required' => true
                ])
            ->add('slug', SlugType::class, [
                'label' => 'back.labels.slug',
                'required' => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SubCategoryTranslation::class,
        ]);
    }
}
