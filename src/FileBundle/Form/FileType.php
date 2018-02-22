<?php

namespace FileBundle\Form;

use AppBundle\Entity\Language;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType as FileType1;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FileType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('file', FileType1::class, array('label' => 'File (Yml file)'))

                ->add('sourceLanguage', EntityType::class, array(
                // looks for choices from this entity
                'class' => Language::class,
                'choice_label' => 'name',
                'multiple' => false,
            ))
            ->add('targetLanguages', EntityType::class, array(
                // looks for choices from this entity
                'class' => Language::class,
                'choice_label' => 'name',
                'multiple' => true,
            ))
            ->add('save', SubmitType::class, array(
            'attr' => array('class' => 'save'),
        ));;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FileBundle\Entity\File'
        ));
    }

    public function getBlockPrefix()
    {
        return 'filebundle_file';
    }


}
