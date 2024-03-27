<?php

namespace App\Form;

use App\Entity\Seo;
use App\Entity\User;
use App\Form\AbstractCustomType;
use App\Form\SeoTranslationType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SeoType extends AbstractCustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', EntityType::class, [
                "class"=>User::class, 
                'required'=>false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.roles LIKE :role')
                        ->setParameter('role', '%"ROLE_ADMIN%')
                        ;
                    },
                "label"=>'back.labels.author',
                'attr'=>["class"=>"form-control"]])
        ;
        foreach($this->locales as $locale){
            $builder->add('translation_'.$locale, SeoTranslationType::class, ["mapped"=>false, "label"=>false, "locale"=>$locale]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Seo::class,
        ]);
    }
}
