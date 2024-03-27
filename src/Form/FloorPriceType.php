<?php

namespace App\Form;

use App\Entity\FloorPrice;
use App\Entity\FloorFamily;
use App\Entity\FloorPriceWidth;
use App\Entity\FloorPriceLength;
use App\Entity\FloorPriceRender;
use App\Entity\FloorPriceFinition;
use Doctrine\ORM\EntityRepository;
use App\Entity\FloorPriceThickness;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\FloorPriceType as EntityFloorPriceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class FloorPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('price', NumberType::class, [ 'label' => 'back.labels.price',])
            ->add('floorFamily', EntityType::class, ['class'=> FloorFamily::class ,'label' => 'back.labels.floorFamily',])
            ->add('floorThickness', EntityType::class, [ 'class'=> FloorPriceThickness::class, 'label' => 'back.labels.floorThickness',])
            ->add('floorType', EntityType::class, [ 'class'=> EntityFloorPriceType::class, 'label' => 'back.labels.floorType',])
            ->add('floorWidth', EntityType::class, [ 'class'=> FloorPriceWidth::class, 'label' => 'back.labels.floorWidth',])
            ->add('floorFinition', EntityType::class, [ 'class'=> FloorPriceFinition::class, 'label' => 'back.labels.floorFinition',])
            ->add('floorlengths', EntityType::class, [ 'class'=> FloorPriceLength::class, 'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.length', 'ASC');
            }
            ,'label' => 'back.labels.floorLength', 'multiple' => true, "attr"=>["class"=>"form-control select2"]])
            ->add('floorRender', EntityType::class, [ 'class'=> FloorPriceRender::class, 'label' => 'back.labels.floorRendering',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FloorPrice::class,
        ]);
    }
}
