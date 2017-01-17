<?php

namespace Evexias\ClientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints as Assert;
use Evexias\ClientBundle\Utils\Tools;
use Symfony\Component\Form\Extension\Core\Type;

/**
 * Création d'une forme d'ajout d'addresse
 *
 * @author Ramy KACEM
 */
class AddressForm extends AbstractType
{

    public function __construct($aOptions = array())
    {
        $this->aListGouv  = Tools::getOption($aOptions, 'gov');
        $this->aListDeleg = Tools::getOption($aOptions, 'deleg');
        $this->aListLocal = Tools::getOption($aOptions, 'loc');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $bRequired = true;
        $builder
                ->add('complete_address', Type\TextType::class, array(
                    'required' => $bRequired,
                    'trim' => true,
                    'attr' => array('placeholder' => 'ph_complete_address'),
                    'constraints' =>
                    array(
                        new Assert\Regex(array(
                            'pattern' => "/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ._'‘°\s-,]*$/",
                            'match' => true,
                            'message' => "anpv")),
                        new Constraints\NotBlank()
                    )
                        )
                )
                
                ->add('governorate', Type\ChoiceType::class, array(
                    'required' => $bRequired,
                    'trim' => true,
                    'attr' => array('class' => 'govChoice', 'placeholder' => ''),
                    'choices' => $this->aListGouv,
                    'constraints' => array(
                        new Assert\Regex(array(
                            'pattern' => "/\d/",
                            'match' => false,
                            'message' => "Invalid")),
                        new Constraints\NotBlank()
                    )
                        )
                )
        ;

        $builder->add('delegation', Type\ChoiceType::class, array(
            'required' => $bRequired,
            'trim' => true,
            'label' => 'Délégation',
            'choices' => $this->aListDeleg,
            'attr' => array('class' => 'delegChoice', 'placeholder' => ''),
            'constraints' => array(
                new Assert\Regex(array(
                    'pattern' => "/\d/",
                    'match' => false,
                    'message' => "Invalid")),
                new Constraints\NotBlank()
            )
                )
        );

        $builder->add('locality', Type\ChoiceType::class, array(
            'required' => $bRequired,
            'trim' => true,
            'attr' => array('class' => 'localChoice', 'placeholder' => ''),
            'label' => 'Localité',
            'choices' => $this->aListLocal,
                )
        )
        ;
    }

    public function getName()
    {
        return 'address';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => true,
        ));
    }

}
