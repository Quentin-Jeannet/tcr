<?php

namespace App\Form;

use App\Entity\Color;
use App\Form\PhotoType;
use App\Entity\ColorFamily;
use App\Form\CustomAbstractType;
use App\Form\Color2TranslationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class Color2Type extends AbstractCustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'back.labels.name'])
            ->add('secondeName', TextType::class, ['label' => 'back.labels.secondeName'])
            ->add('hexadecimal1', ColorType::class, ['label' => 'back.labels.color'])
            ->add('isActive', CheckboxType::class, ['label' => 'back.labels.active'])
            ->add('colorFamilies', EntityType::class, [
                'label' => 'back.labels.colorFamily',
                'class' => ColorFamily::class,
                'choice_label' => 'displayName',
                'multiple' => true,
                'expanded' => false,
                'by_reference' => false,
                'attr' => ['class' => 'select2'],
            ])
            ->add('colors', EntityType::class, [
                'label' => 'back.labels.associatedColors',
                'class' => Color::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'by_reference' => false,
                'attr' => ['class' => 'select2'],
                'required' => false,
            ])
        ;
        foreach($this->locales as $locale){
            $builder->add('translation_'.$locale, Color2TranslationType::class, ["mapped"=>false, "label"=>false]);
        }
        ;
        $builder
        ->add('photos', CollectionType::class, [
            'entry_type' => PhotoType::class,
            'label' => false,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
            'required' => false,
        ]);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Color::class,
        ]);
    }
}
