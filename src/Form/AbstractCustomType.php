<?php

namespace App\Form;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbstractCustomType extends AbstractType
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    protected $locales;
    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct()
    {
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $this->locales = $value["framework"]["translator"]["enabled_locales"];
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
