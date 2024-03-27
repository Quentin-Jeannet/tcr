<?php

namespace App\Form;

use App\Entity\FloorPatternTranslation;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FloorPatternTranslationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'back.labels.name',
            ])
            // ->add('locale')
            ->add('description', CKEditorType::class, [
                'label' => 'back.labels.description',
                'config' => ['toolbar' => 'basic'],
            ])
            // ->add('floorPattern')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FloorPatternTranslation::class,
        ]);
    }
}
