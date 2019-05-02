<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use AppBundle\Form\DetailsMissionType;
use AppBundle\Form\SuiviMissionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MissionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('tempsReel')
            ->add('tempsEstime')
            ->add('date', DateTimeType::class, array('widget' => 'single_text'))
            ->add('state', EntityType::class, array('class' => 'AppBundle:State'))
            ->add('detailsMission', DetailsMissionType::class)
            ->add('suiviMission', SuiviMissionType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Mission',
            'csrf_protection'   => false,
        ));
    }


}
