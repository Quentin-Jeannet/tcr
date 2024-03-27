<?php

namespace App\Form;

use App\Entity\User;
use App\Form\AddressType;
use App\Form\UserAvatarType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ["label" => "back.labels.email", "required" => true])
            ->add('name', TextType::class, ["label" => "back.labels.name", "required" => false])
            ->add('firstName', TextType::class, ["label" => "back.labels.firstname", "required" => false])
            ->add('phone', TelType::class, ["label" => "back.labels.phone", "required" => false])
            ->add('userAvatar', UserAvatarType::class, ["label" => 'back.labels.avatar'])
            ->remove('addresses', CollectionType::class, [
                'entry_type' => AddressType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ])
            ->remove('colors')
            ->remove('isVerified')
            ->remove('secretIV')
            ->remove('panier')
            ->remove('roles')
            ->remove('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
