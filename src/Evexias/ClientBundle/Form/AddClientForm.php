<?php

namespace Evexias\ClientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;

class AddClientForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('email', Type\EmailType::class, array(
                    'required' => true,
                    'trim' => true,
                    'attr' => array(
                        'placeholder' => 'Email',
                        'autocomplete' => 'off',
                        'class' => 'form-control'
            )))
        ;
    }

    public function getBlockPrefix() {
        return 'add_client';
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => true
        ));
    }

}
