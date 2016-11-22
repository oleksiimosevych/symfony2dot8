<?php

namespace CoursesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//+
use SymfonyComponentOptionsResolverOptionsResolverInterface;

class CourseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('contents')
            ->add('price')
            ->add('created_at', 'datetime')
            ->add('updated_at', 'datetime')
            ->add('category')
            ->add('type', 'choice', array('choices' => Course::getTypes(), 'expanded' => true))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    //in jobeet it is fu defaultOptions(OptionsResolverInterface $resolver)
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoursesBundle\Entity\Course'
        ));
    }

    public function getName(){
        return 'course';//job
    }

}
