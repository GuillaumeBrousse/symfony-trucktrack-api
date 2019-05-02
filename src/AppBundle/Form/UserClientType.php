<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\ClientType;

class UserClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('userName', "Symfony\Component\Form\Extension\Core\Type\TextType")
        ->add('email', "Symfony\Component\Form\Extension\Core\Type\EmailType")
        ->add('plain_password', "Symfony\Component\Form\Extension\Core\Type\RepeatedType", array( 'type' => "Symfony\Component\Form\Extension\Core\Type\PasswordType", 'invalid_message' => 'Erreur vérification mot de passe' ) )
        ->add('client', ClientType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'csrf_protection'   => false,
        ));
    }

}
