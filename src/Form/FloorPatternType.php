<?php

namespace App\Form;

use App\Entity\FloorPattern;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FloorPatternType extends AbstractCustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
                'label' => 'back.labels.image',
                'required' => false,
                // 'mapped' => false,
            ])
            // ->add('createdAt')
            // ->add('updatedAt')
            // ->add('rankOrder')
            ->add('isActive', CheckboxType::class, [
                'label' => 'back.labels.active',
                'required' => false,
            ])
            // ->add('createdBy')
            // ->add('updatedBy')
        ;
        foreach ($this->locales as $locale) {
            $builder->add('translation_'.$locale, FloorPatternTranslationType::class, ["mapped" => false, "label" => false]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FloorPattern::class,
            'edition'=>true,
        ]);
    }
}
