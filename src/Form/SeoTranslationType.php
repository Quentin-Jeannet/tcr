<?php

namespace App\Form;

use App\Entity\SeoTranslation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SeoTranslationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('locale', HiddenType::class, ['data'=>$options['locale']])
            ->add('keywords', TextType::class, ["label"=>"back.labels.title", "required"=>false])
            ->add('description', TextareaType::class, ["label"=>"back.labels.description", "required"=>false, "attr"=>["maxlength"=>160, "class"=>"description-area"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SeoTranslation::class,
            'locale' => "",
        ]);
    }
}
