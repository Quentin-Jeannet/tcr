<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\ColorFamily;
use App\Form\ColorFamilyTranslationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColorFamilyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('active')
            ->add('active')
            ->add('category')
        ;
        foreach($options["data"]->getLocales() as $locale){
            $builder->add('translation_'.$locale, ColorFamilyTranslationType::class, ["mapped"=>false]);
        }
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ColorFamily::class,
        ]);
    }
}
