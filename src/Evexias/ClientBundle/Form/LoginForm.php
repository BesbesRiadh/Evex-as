<?php

namespace Evexias\ClientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;

class LoginForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('login', Type\TextType::class, array(
                    'required' => true,
                    'trim' => true,
                    'attr' => array(
                        'placeholder' => 'Login',
                        'autocomplete' => 'off',
                        'class' => 'form-control'
            )))
                ->add('password', Type\PasswordType::class, array(
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'Mot de passe',
                        'class' => 'form-control'
            )))
        ;
    }

    public function getBlockPrefix() {
        return 'login';
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Evexias\ClientBundle\Entity\Client'
        ));
    }

}
