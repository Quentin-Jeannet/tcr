<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if(!$options['isBackend']) {
            $builder
                ->add('email', EmailType::class, [
                    'label' => 'front.footer.newsletter',
                    'label_attr' => [
                        'class' => 'newletter-label',
                    ],
                    'attr' => [
                        'placeholder' => 'front.footer.email',
                        'class' => 'footer-form'
                    ]
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'front.footer.subscribe',
                    'attr' => [
                        'class' => 'footer-button btn-subscribe'
                    ]
                ])
            ;
        }else{
            $builder
            ->add('email', EmailType::class, [
                'label' => 'back.labels.email',
                'required' => true,
            ])
        ;
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
            'isBackend' => false,
        ]);
    }
}
