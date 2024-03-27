<?php

namespace App\Form;

use App\Entity\Floor;
use App\Form\PhotoType;
use App\Entity\FloorFamily;
use App\Entity\FloorPattern;
use App\Form\AbstractCustomType;
use App\Form\FloorTranslationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FloorType extends AbstractCustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ['label' => 'back.labels.image', 'required' => $options['edition']])
            ->add('text', TextType::class, ['label' => 'back.labels.name'])
            ->add('isActive')
            ->add('floorFamily', EntityType::class, [
                'label' => 'back.labels.floorFamily',
                'class' => FloorFamily::class,
                'choice_label' => 'displayName',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('patterns', EntityType::class, [
                'class' => FloorPattern::class,
                'choice_label' => 'displayName',
                'multiple' => true,
                'expanded' => false,
                'by_reference' => false,
                'attr' => ['class' => 'select2'],
                'required' => false,
            ])
            ->add('photos', CollectionType::class, [
                'entry_type' => PhotoType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' => false,
            ])
            ->remove('createdBy')
            ->remove('updatedBy')
            ->remove('createdAt')
            ->remove('updatedAt')
            ->remove('rankOrder')
            ;
        foreach($this->locales as $locale){
            $builder->add('translation_'.$locale, FloorTranslationType::class, ["mapped"=>false, "label"=>false]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Floor::class,
            'edition' => true,
        ]);
    }
}
