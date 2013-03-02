<?php

namespace TL\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ClientEditForm extends AbstractType
{
    /**
     * Build the form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('phone','text', array(
                    'label' => 'Phone Number',
                    'required' => true
                ))
                ->add('email','text', array(
                    'label' => 'Email',
                    'required' => true
                ))
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'first_name' => 'password',
                    'second_name' => 'confirm',
                    'first_options'  => array('label' => 'Choose a Password'),
                    'second_options'  => array('label' => 'Confirm your Password'),
                ))
                ->add('website', 'text', array(
                    'label' => 'Website URL (optional)',
                    'required' => false
                ))
                ->add('company','text', array(
                    'label' => 'Business Name',
                    'required' => true
                ))
                ->add('address1','text', array(
                    'label' => 'Address Line 1',
                    'required' => true
                ))
                 ->add('address2','text', array(
                    'label' => 'Address Line 2',
                    'required' => false
                ))
                 ->add('city','text', array(
                    'label' => 'City / Town',
                    'required' => true
                ))
                 ->add('postcode','text', array(
                    'label' => 'Postcode',
                    'required' => true
                ))
                ->add('country', null , array(
                    'label' => 'Country',
                    'required' => true
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
        return 'tl_mainbundle_editclientform';
    }
}

