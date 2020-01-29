<?php

namespace LaTorres\BodegaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoInsumoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('etiquetas')
           ->add('insumos', 'collection', array(
                'type'           => new InsumoType(),
                'label'          => 'Insumos Usados',
                'by_reference'   => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LaTorres\BodegaBundle\Entity\TipoInsumo'
        ));
    }

    public function getName()
    {
        return 'latorres_bodegabundle_tipoinsumotype';
    }
}
