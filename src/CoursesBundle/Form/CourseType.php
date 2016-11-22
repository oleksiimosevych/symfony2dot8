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
            //->add('logo', null, array('label' => 'Course logo'))
            ->add('name', null, array('label' => 'Назва курсу'))
            ->add('contents', null, array('label' => 'Опис  курсу'))
            ->add('price', null, array('label' => 'Ціна  курсу'))
            ->add('created_at', null, array('label' => 'Дата створення курсу(по-замовчуванню - поточна дата)'))
            ->add('updated_at', null, array('label' => 'Дата оновлення курсу'))
            ->add('category', null, array('label' => 'Категорія курсу'))
            //->add('type', 'choice', array('choices' => Course::getTypes(), 'expanded' => true))
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
