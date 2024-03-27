<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'front.contact.email',
                'required' => true,
            ])
            ->add('subject', TextType::class, [
                'label' => 'front.contact.subject',
                'required' => true,
            ])
            ->add('text', TextareaType::class, [
                'label' => 'front.contact.message',
                'required' => true,
                'attr' => [
                    'rows' => 10,
                ],
            ])
            ->add('send', SubmitType::class, [
                'label' => 'front.contact.send',
                'attr' => [
                    'class' => 'mt-2 btn btn-primary',
                ],
            ])
            ->remove('createdAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
