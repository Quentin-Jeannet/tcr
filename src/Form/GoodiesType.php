<?php

namespace App\Form;

use App\Entity\Goodies;
use App\Form\GoodiesTranslationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class GoodiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
                'label' => 'Image',
                'required' => false
                ])
            ->add('price', MoneyType::class)
        ;
        foreach($options["data"]->getLocales() as $locale){
            $builder->add('translation_'.$locale, GoodiesTranslationType::class, ["mapped"=>false, "label"=>false]);
        }
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Goodies::class,
        ]);
    }
}
