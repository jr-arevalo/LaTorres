<?php
 
namespace LaTorres\BodegaBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

 
class AddTipoInsumoFieldSubscriber implements EventSubscriberInterface
{
    private $factory;
 
    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
               FormEvents::POST_SET_DATA => 'postSetData',
               FormEvents::PRE_BIND => 'preBind'
        );
    }
 
   
 
            private function addInsumoForm($form,$tipoInsumo,$insumo)
    {
        $form->add($this->factory->createNamed('tipoInsumo','entity', $tipoInsumo, array(
            'class'         => 'BodegaBundle:TipoInsumo',
            'empty_value'   => 'Escoja Opcion',
            'mapped'        => false,
         
        )))
                ->add($this->factory->createNamed('insumo','entity', $insumo, array(
            'class'         => 'BodegaBundle:Insumo',
            'empty_value'   => 'Escoja Insumo',
             'query_builder' => function (EntityRepository $repository) use ($tipoInsumo) {
                $qb = $repository->createQueryBuilder('i')
                     ->where('i.tipoInsumo = :tipoInsumo')
                    ->setParameter('tipoInsumo', $tipoInsumo);
               
                return $qb;
            }
        )));
   
    }
    
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
        
        $tipoInsumo = ($data->getInsumo()) ? $data->getInsumo()->getTipoInsumo() : null ;
         $insumo = ($data->getInsumo()) ? $data->getInsumo() : null ;
       $this->addInsumoForm($form,$tipoInsumo,$insumo);          
    }

  public function postSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
        
        $tipoInsumo = ($data->getInsumo()) ? $data->getInsumo()->getTipoInsumo() : null ;
        $insumo = ($data->getInsumo()) ? $data->getInsumo() : null ;
        
        $this->addInsumoForm($form,$tipoInsumo,$insumo);
       
    }
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }   
          $tipoInsumo = array_key_exists('tipoInsumo', $data) ? $data['tipoInsumo'] :null ;
          $insumo = array_key_exists('insumo', $data) ? $data['insumo'] :null ;
        $this->addInsumoForm($form, $tipoInsumo,$insumo);
               
    }
   
}