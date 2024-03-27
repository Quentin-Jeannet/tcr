<?php

namespace App\Form;

use App\Entity\Category;
use App\Form\CategoryTranslationType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractCustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rankOrder', IntegerType::class, ["label"=>"back.labels.rank", "required"=>$options["edition"]])
            ->add('isMenu', null, ["label"=>"back.labels.isMenu"])
            ->add('seo', SeoType::class, ["label"=>false])
        ;
        foreach($options["data"]->getLocales() as $locale){
            $builder
                ->add('translation_'.$locale, CategoryTranslationType::class, ["mapped"=>false, "label"=>false, "edition"=>$options["edition"]]);
        }
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
            'edition'=>false,
        ]);
    }
}
