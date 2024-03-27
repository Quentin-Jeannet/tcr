<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Commande;
use App\Entity\Delivery;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\AddressRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresseLivraison', EntityType::class, [
                'class' => Address::class,
                'choices' => $options['addresses'],
                'label' => 'front.panier.commande.livraison',
                'required' => false,
                'data' => $options['livraison'] != null ? $options['livraison'] :( $options['addresses'] != null && count($options['addresses']) > 0 ? $options['addresses'][0] : null),
                'placeholder' => false,
                'expanded' => true,
                'multiple' => false,
            ])
            ->add( 'adresseFacturation', EntityType::class, [
                'class' => Address::class,
                'choices' => $options['addresses'],
                'label' => 'front.panier.commande.facturation',
                'required' => false,
                'data' => $options['facturation'] != null ? $options['facturation'] :($options['addresses'] != null && count($options['addresses']) > 0 ? $options['addresses'][0] : null),
                'placeholder' => false,
                'expanded' => true,
                'multiple' => false,
                ])
            ->add('delivery', EntityType::class, [
                'class' => Delivery::class,
                'label' => false,
                'row_attr' => [
                    'class' => 'toto',
                ],
                'choices' => $options['deliveries'],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'data' => $options['delivery'] != null ? $options['delivery'] : ($options['deliveries'] != null && count($options['deliveries']) > 0 ? $options['deliveries'][0] : null),
                'placeholder' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
            'addresses' => null,
            'facturation' => null,
            'livraison' => null,
            'delivery' => null,
            'deliveries' => null,
        ]);
    }
}
