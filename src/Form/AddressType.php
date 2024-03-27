<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('address', TextType::class, [
                "label" => "back.labels.address",
                "required" => true
            ])
            ->add('complement', TextType::class, [
                "label" => "back.labels.complementAddress",
                "required" => false
            ])
            ->add('zip', TextType::class, [
                "label" => "back.labels.zipCode",
                "required" => true
            ])
            ->add('city', TextType::class, [
                "label" => "back.labels.city",
                "required" => true
            ])
            ->add('country', CountryType::class, [
                'preferred_choices' => ['BE'],
                "label" => "back.labels.country",
                "required" => true
            ])
            ->add('name', TextType::class, [
                "label" => "back.labels.name",
                "required" => true
            ])
            ->remove('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
