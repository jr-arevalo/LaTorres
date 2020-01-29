<?php

namespace LaTorres\ProduccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use LaTorres\BodegaBundle\Form\InsumoType;
class TareaInsumoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('insumo')
           
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LaTorres\ProduccionBundle\Entity\TareaInsumo'
        ));
    }

    public function getName()
    {
        return 'form_tarea';
    }
}
