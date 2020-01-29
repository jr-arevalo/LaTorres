<?php

namespace LaTorres\BodegaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use LaTorres\BodegaBundle\Form\EventListener\AddInsumoFieldSubscriber;
use LaTorres\BodegaBundle\Form\EventListener\AddTipoInsumoFieldSubscriber;

class RegistroBodegaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $factory = $builder->getFormFactory();
         $builder->addEventSubscriber(new AddTipoInsumoFieldSubscriber($factory))
             
            ->add('cantidad');
       
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LaTorres\BodegaBundle\Entity\RegistroBodega'
        ));
    }

    public function getName()
    {
        return 'form_registrobodega';
    }
}
