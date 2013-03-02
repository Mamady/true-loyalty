<?php

namespace TL\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use YV\AdvocateBundle\DBAL\Gender;
use YV\UserBundle\Form\EmailForm;

class RegisterClientForm extends AbstractType
{
    /**
     * Build the form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('title', 'choice', array(
                    'label' => 'Title',
                    'choices' => array('Mr', 'Mrs', 'Miss', 'Ms', 'Master')
                ))
                ->add('firstName','text', array(
                    'label' => 'First Name',
                    'required' => true
                ))
                ->add('lastName','text', array(
                    'label' => 'Last Name',
                    'required' => true
                ))
                ->add('phone','text', array(
                    'label' => 'Phone Number',
                    'required' => true
                ))
                ->add('email','text', array(
                    'label' => 'Email',
                    'required' => true
                ))
                ->add('password', 'password', array(
                    'required' => true
                ))

                ->add('dob','birthday', array(
                    'label' => 'registration.advocate.dob',
                    'required' => true
                ))
                ->add('country', null , array(
                    'label' => 'registration.advocate.country',
                    'required' => true
                ))
                ->add('terms', 'checkbox', array(
                    'property_path' => false,
                    'label' => 'registration.advocate.terms',
                    'required' => true
                ))
                 ->add('betaTester', 'checkbox', array(
                    'label' => 'registration.advocate.betaTester',
                    'required' => false
                ))
        ;
    }

    /**
     * Get the forms name
     *
     * @return string Name
     */
    public function getName()
    {
        return 'yv_advocatebundle_advocatetype';
    }
}

