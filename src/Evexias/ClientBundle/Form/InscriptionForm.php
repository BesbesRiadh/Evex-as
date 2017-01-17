<?php

namespace Evexias\ClientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Evexias\ClientBundle\Utils\Tools;

class InscriptionForm extends AbstractType {

    public function __construct($aOptions = array()) {
        $this->aListGouv = Tools::getOption($aOptions, 'gov');
        $this->aListDeleg = Tools::getOption($aOptions, 'deleg');
        $this->aListLocal = Tools::getOption($aOptions, 'loc');
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('nom', Type\TextType::class, array(
                    'required' => true,
                    'trim' => true,
                    'attr' => array(
                        'placeholder' => 'Nom',
                        'autocomplete' => 'off',
                        'class' => 'form-control'
            )))
                ->add('prenom', Type\TextType::class, array(
                    'required' => true,
                    'trim' => true,
                    'attr' => array(
                        'placeholder' => 'Prénom',
                        'autocomplete' => 'off',
                        'class' => 'form-control'
            )))
                ->add('cin', Type\TextType::class, array(
                    'required' => true,
                    'trim' => true,
                    'attr' => array(
                        'placeholder' => "Numéro carte d'identité",
                        'autocomplete' => 'off',
                        'class' => 'form-control'
            )))
                ->add('email', Type\EmailType::class, array(
                    'required' => true,
                    'trim' => true,
                    'attr' => array(
                        'placeholder' => 'Email',
                        'autocomplete' => 'off',
                        'class' => 'form-control'
            )))
                ->add('login', Type\TextType::class, array(
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
                ->add('numero', Type\TextType::class, array(
                    'required' => true,
                    'trim' => true,
                    'attr' => array(
                        'placeholder' => 'Numéro de téléphone',
                        'autocomplete' => 'off',
                        'class' => 'form-control'
            )))
                ->add('age', Type\NumberType::class, array(
                    'required' => true,
                    'trim' => true,
                    'attr' => array(
                        'placeholder' => 'Age',
                        'autocomplete' => 'off',
                        'class' => 'form-control'
            )))
//                ->add('address', Type\CollectionType::class, array(
//                    'entry_type' => AddressForm::class,
//                    'data' => array('gov' => $this->aListGouv,
//                        'deleg' => $this->aListDeleg,
//                        'loc' => $this->aListLocal)
//                        )
//                )

        ;
    }

    public function getBlockPrefix() {
        return 'inscription';
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => true
        ));
    }

}
