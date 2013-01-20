<?php

namespace TL\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegisterClientForm extends BaseType
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
                    'choices' => array(
                        'Mr' => 'Mr',
                        'Mrs' => 'Mrs',
                        'Miss' => 'Miss',
                        'Ms' => 'Ms',
                        'Mister' => 'Master',
                    ),
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
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'first_name' => 'password',
                    'second_name' => 'confirm',
                    'first_options'  => array('label' => 'Choose a Password'),
                    'second_options'  => array('label' => 'Confirm your Password'),
                ))
                ->add('website', 'text', array(
                    'label' => 'Website URL',
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
                ->add('plan', 'hidden', array(
                    'required' => true
                ))
                ->add('country', null , array(
                    'label' => 'Country',
                    'required' => true
                ))
                 ->add('tandc', 'checkbox', array(
                    'label' => 'I agree to True Loyalty\'s Terms and Conditions and Privacy Policy <span class="required">*</span>',
                    'property_path' => false,
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
        return 'tl_userbundle_registerclientform';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'      => 'TL\UserBundle\Entity\User',
            'csrf_protection' => false,
        ));
    }
}

