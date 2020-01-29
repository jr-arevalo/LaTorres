<?php
namespace LaTorres\ProduccionBundle\Entity;
use Doctrine\ORM\EntityRepository;

class TareaRepository extends EntityRepository
{
	public function findTareasDelDia()
	{
		$fechaCreacion = new \DateTime('today');
		$em = $this->getEntityManager();
		$dql = 'SELECT t, e
		FROM ProduccionBundle:Tarea t
		JOIN t.empleado e
		WHERE t.fecha = :fecha';
		$consulta = $em->createQuery($dql);
		$consulta->setParameter('fecha', $fechaCreacion);
		return $consulta->getResult();
	}
       
}