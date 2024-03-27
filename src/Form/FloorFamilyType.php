<?php

namespace App\Form;

use App\Entity\FloorPrice;
use App\Entity\FloorFamily;
use App\Form\AbstractCustomType;
use App\Form\FloorFamilyTranslationType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FloorFamilyType extends AbstractCustomType
{
    private $entity;
    private $sql;
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // dd($builder->getData());
        $this->entity = $builder->getData();
        $this->sql = "p.floorFamily is NULL";
        if($this->entity->getId()){
            $this->sql = "p.floorFamily = ".$this->entity->getId();
        }
        
        $builder
            ->add('text', TextType::class, ['label' => 'back.labels.name'])
            ->add('isActive')
            ->remove('floorPrices', EntityType::class, [
                "class"=> FloorPrice::class,
                "by_reference"=>false,
                "multiple"=>true ,
                'query_builder'=> function(EntityRepository $er){
                    return $er->createQueryBuilder('p')
                    ->where($this->sql)
                    ;
                },
                "attr"=>["class"=>"select2"],
                "required"=>false
            ])
            ->remove('category')
            ->remove('createdAt')
            ->remove('updatedAt')
            ->remove('rankOrder')
            ->remove('createdBy')
            ->remove('updatedBy')
        ;
        foreach ($this->locales as $locale) {
            $builder->add('translation_'.$locale, FloorFamilyTranslationType::class, ["mapped" => false, "label" => false]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FloorFamily::class,
        ]);
    }
}
