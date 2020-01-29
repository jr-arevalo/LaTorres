<?php
 
namespace LaTorres\ProduccionBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
 
class AddInsumosFieldSubscriber implements EventSubscriberInterface
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
            FormEvents::PRE_BIND     => 'preBind'
        );
    }
 
    private function addInsumoForm($form, $tipoTarea)
    {
        $form->add($this->factory->createNamed('registroBodega','collection', null, array(
            'class'         => 'BodegaBundle:RegistroBodega',
            'query_builder' => function (EntityRepository $repository) use ($tipoTarea) {
                $qb = $repository->createQueryBuilder('city')
                    ->innerJoin('city.province', 'province');
                if ($province instanceof Province) {
                    $qb->where('city.province = :province')
                    ->setParameter('province', $province);
                } elseif (is_numeric($province)) {
                    $qb->where('province.id = :province')
                    ->setParameter('province', $province);
                } else {
                    $qb->where('province.name = :province')
                    ->setParameter('province', null);
                }
 
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
 
        $province = ($data->city) ? $data->city->getProvince() : null ;
        $this->addCityForm($form, $province);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $tipoTarea = array_key_exists('form_tarea_tipoTarea', $data) ? $data['form_tarea_tipoTarea'] : null;
        $this->addInsumoForm($form, $tipoTarea);
    }
}