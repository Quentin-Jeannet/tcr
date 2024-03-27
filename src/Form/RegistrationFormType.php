<?php

namespace App\Form;

use App\Entity\User;
use App\Form\AddressType;
use App\Form\UserAvatarType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                "label" => "back.labels.email",
                "required" => true
            ])
            ->remove('firstname', TextType::class, [
                "label" => "back.labels.firstname",
                "required" => false
            ])
            ->remove('name', TextType::class, [
                "label" => "back.labels.name",
                "required" => true
            ])
            ->remove('phone', TelType::class, [
                "label" => "back.labels.phone",
                'required' => false,
            ])
            ->remove('userAvatar', UserAvatarType::class, [
                "label" => 'back.labels.avatar'
            ])


            ->remove('agreeTerms', CheckboxType::class, [
                "label" => "I agree with terms *",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->remove('addresses', CollectionType::class, [
                'entry_type' => AddressType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ])
            ->add('password', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type' => PasswordType::class,
                'invalid_message' => 'Password and confirmation must be identical',
                'required' => true,
                'first_options' => [
                    'label' => 'back.labels.password',
                    'help' => 'front.login.password_pregmatch',
                ],
                'second_options' => [
                    'label' => 'back.labels.confirmPassword',
                ],
                
            ])
            ->add('_csrf_token', HiddenType::class, [
                'mapped' => false,
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'registration_form__token',
        ]);
    }
}
