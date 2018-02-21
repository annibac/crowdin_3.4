<?php

namespace FileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType as FileType1;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FileType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('file', FileType1::class, array('label' => 'File (Yml file)'))
            ->add('sourceLanguage')
            ->add('targetLanguages')
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
