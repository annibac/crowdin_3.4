<?php

namespace FileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType as FileType1;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddTrad extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value')
            ->add('language')
            ->add('save', SubmitType::class, array(
                'attr' => array('class' => 'save'),
            ));;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FileBundle\Entity\Value'
        ));
    }

    public function getBlockPrefix()
    {
        return 'filebundle_trad';
    }


}