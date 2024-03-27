<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use function Symfony\Component\VarDumper\Dumper\esc;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if(!is_null($options["role"])){
            if(in_array("ROLE_SUPERADMIN", $options["role"])){
                $role = "Superadmin";
            }elseif(in_array("ROLE_ADMIN", $options["role"]) && !in_array("ROLE_SUPERADMIN", $options["role"])){
                $role="Administrateur";
            }else{
                $role= "Utilisateur";
            }
        }
        if(!$options["edition"]){
            $builder
            ->add('plainPassword', PasswordType::class, ["mapped"=>false, "label"=>"back.labels.password" , "required"=>true])
            ->add('confirmPassword', PasswordType::class, ["mapped"=>false, "label"=>"back.labels.confirmPassword" , "required"=>true])
            ->add('plainRole', ChoiceType::class, ["label"=>'back.labels.role', 'choices'  => [
                'back.labels.roleUser' => 'Utilisateur',
                'back.labels.roleAdmin' => 'Administrateur',
                'back.labels.roleSuperAdmin' => "Superadmin",
            ], 
            'attr'=>["class"=>"form-control"]])
            ;
        }else{
            $builder
            ->add('plainPassword', PasswordType::class, ["mapped"=>false, "label"=>"back.labels.password" , "required"=>false])
            ->add('confirmPassword', PasswordType::class, ["mapped"=>false, "label"=>"back.labels.confirmPassword" , "required"=>false])
            ->add('plainRole', ChoiceType::class, ["label"=>'back.labels.role', 'choices'  => [
                'back.labels.roleUser' => 'Utilisateur',
                'back.labels.roleAdmin' => 'Administrateur',
                'back.labels.roleSuperAdmin' => "Superadmin",
            ], 
            'preferred_choices' => [$role],
            'attr'=>["class"=>"form-control"]])
            ;
        }
        $builder
            ->add('email', EmailType::class, ["label"=> "back.labels.email" , "required"=>true])
            ->add('name', TextType::class, ["label"=>"back.labels.name", "required"=>false])
            ->add('firstName', TextType::class, ["label"=>"back.labels.firstname", "required"=>false])
            ->add('phone', TelType::class, ["label"=>"back.labels.phone", "required"=>false])
            // ->add('roles')
            // ->add('isVerified')
            // ->add('secretIV')
            // ->add('colors')
            // ->add('panier')
            ->add('userAvatar', UserAvatarType::class, ["label"=>'back.labels.avatar'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'edition'=>false,
            'role'=> []
        ]);
    }
}
