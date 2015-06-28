<?php

namespace BookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builderInterface, array $options)
    {
        $builderInterface->add('username', 'text', ['label' => 'User Name'])
                         ->add('password', 'password', ['label' => 'User Password'])
                         ->add('confirm', 'password', ['mapped' => false, 'label' => 'Re-type'])
                         ->add('email', 'email', ['label' => 'User Email'])
                         ->add('save', 'submit', ['label' => 'Register'])
        ;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'registration';
    }

    public function setDefaultOptions(OptionsResolverInterface $optionsResolverInterface)
    {
        $optionsResolverInterface->setDefaults([
            'data_class' => 'BookBundle\Entity\User'
        ]);
    }

} 
