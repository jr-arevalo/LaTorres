<?php

namespace LaTorres\ProduccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class TareaType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if(array_key_exists ('tipoTarea',$options)){
        $tipoTarea=$options['tipoTarea'];}
		/*$cantLabel="No de ";
		switch($tipoTarea){
		case 1:		$cantLabel.="Plantas Enfundadas";
		break;
		case 2:		$cantLabel.="Racimos Cortados";
		break;
		case 8:		$cantLabel.="Hcts Fertilizadas";
		break;
		case 9:		$cantLabel.="Racimos Procesados";
		break;
		default:		$cantLabel.="";
		break;
		}*/

                              
        $builder
            
			//->add('fecha','date', array('widget' => 'single_text','format' => 'yyyy-MM-dd'))
			
			->add('tipoTarea',null, array('empty_value' => false,'label' => 'Tipo de Tarea'))
			->add('lote')			
			->add('empleado',null, array( 'label' => 'Empleados Añadidos')) 
			->add('registroBodega', 'collection', array(
                'type'           => new \LaTorres\BodegaBundle\Form\RegistroBodegaType(),
                'label'          => 'Insumos Usados',
                'by_reference'   => false,       
                 'allow_add'      => true ,
                            
                            ));
			if($tipoTarea==10)
			 $builder->add('cajasProd','collection', array(
                'type'           => new CajasProdType(),
                'label'          => 'Cajas Producidas',
                'by_reference'   => false,
                'allow_delete'   => true,
                'allow_add'      => true));
			/*if($tipoTarea!=10)
			  $builder->add('cantidad','text', array( 'label' => $cantLabel));
					
			/*if(array_key_exists ('id',$options)){
			$builder->add('empleado', 'entity', array('class' => 'UsuarioBundle:Empleado',
			'multiple'=>true,
			'query_builder' => function(EntityRepository $er) use ( $options ){
			$idTarea=0;
			$idTarea=$options['id'];
			return $er->createQueryBuilder('e')
			->innerJoin('e.tarea','t')
			->where('t.id=:Tarea')
			->setParameter('Tarea', $idTarea);
			
			}
		));
			}
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
		
		/*$builder->addEventListener(FormEvents::PRE_BIND, function (FormEvent $event)
        {
            $form = $event->getForm();
            $tarea = $event->getData();

            if(array_key_exists('empleado', $form)) {
               $tarea['empleado'].setData($form['empleado']);
            }
        });*/
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            
			'data_class' => 'LaTorres\ProduccionBundle\Entity\Tarea',
			'tipoTarea'=>1,
        ));
    }

    public function getName()
    {
        return 'form_tarea';
    }
}
