<?php

namespace LaTorres\BodegaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InsumoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('detalle')
            ->add('cantStock')
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LaTorres\BodegaBundle\Entity\Insumo'
        ));
    }

    public function getName()
    {
        return 'form_insumo';
    }
}
