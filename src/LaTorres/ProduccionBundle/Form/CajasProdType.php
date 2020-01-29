<?php

namespace LaTorres\ProduccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajasProdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cajasProd')
            ->add('categoria')
            ->add('tipoCaja')
			->add('marcaCaja')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LaTorres\ProduccionBundle\Entity\CajasProd'
        ));
    }

    public function getName()
    {
        return 'form_cajasProd';
    }
}
