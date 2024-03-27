<?php

namespace App\Form;

use App\Entity\Finish;
use App\Entity\Price;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // dd($options["data"]);
        switch($options["articleType"]){
            case "paint":
                $builder
                ->add('mesure', ChoiceType::class, [
                    "label"=>"back.labels.measure", 
                    "choices"=>["back.labels.milliliter"=>"mL", "back.labels.liter"=>"L"]])
                ->add('finish', EntityType::class, [ "label"=>"finition", "class"=>Finish::class, "choice_label"=>"displayName"])
                ;
                break;
            case "floor":
                $builder
                ->add('mesure', ChoiceType::class, [
                    "label" => "back.labels.measure",
                    "choices" => [
                        "m²" => "m²",
                        "cm²" => "cm²",
                    ],
                    "required" => true,
                ])
                ;
                break;

        }
        $builder
            ->add('quantity', NumberType::class, ["label"=>"back.labels.quantity"])
            ->add('price', MoneyType::class, ["label"=>"back.labels.price"])
            ->add('articleType', HiddenType::class, ["data"=>$options["articleType"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Price::class,
            'articleType' => null,
        ]);
    }
}
