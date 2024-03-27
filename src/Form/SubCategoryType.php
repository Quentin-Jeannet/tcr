<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\SubCategory;
use App\Form\AbstractCustomType;
use App\Form\SubCategoryTranslationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class SubCategoryType extends AbstractCustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // dd($options["data"]);
        $builder
            ->add('imageFile', FileType::class, [
                'label' => 'Image',
                'required' => false
                ])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'displayName',
                'multiple' => true,
                // 'expanded' => true,
                'label' => 'back.titles.categories',
                'required' => false
                ])
        ;
        foreach($options["data"]->getLocales() as $locale){
            $builder->add('translation_'.$locale, SubCategoryTranslationType::class, ["label"=>false, "mapped"=>false]);
        }
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SubCategory::class,
            'edition'=>false,
        ]);
    }
}
