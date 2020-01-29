<?php

namespace LaTorres\ProduccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class TareaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		
        $builder
            ->add('tipoTarea')
			->add('lote')
			->add('fecha','date', array('widget' => 'single_text'))
		->add('empleado')
			->add('cantidad','text');
			
		/*, 'entity', array('class' => 'UsuarioBundle:Empleado',
			'multiple'=>true,
			'query_builder' => function(EntityRepository $er) use ( $options ){
			$idTarea=0;
			if(array_key_exists ('id',$options)){	$idTarea=$options['id'];	}
			return $er->createQueryBuilder('e')
			->innerJoin('e.tarea','t')
			->where('t.id=:Tarea')
			->setParameter('Tarea', $idTarea);
			
			}
		)*/
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LaTorres\ProduccionBundle\Entity\Tarea',
			'id'=>0
        ));
    }

    public function getName()
    {
        return 'form_tarea';
    }
}
