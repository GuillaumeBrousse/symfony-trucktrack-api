<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Form\CargaisonType;

class DetailsMissionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destinataire', EntityType::class, array('class' => 'AppBundle:Destinataire'))
            ->add('remettant', EntityType::class, array('class' => 'AppBundle:Remettant'))
            ->add('cargaison', CargaisonType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DetailsMission',
            'csrf_protection'   => false,
        ));
    }

}
