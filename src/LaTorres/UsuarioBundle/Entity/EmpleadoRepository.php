<?php
namespace LaTorres\UsuarioBundle\Entity;
use Doctrine\ORM\EntityRepository;

class EmpleadoRepository extends EntityRepository
{
	public function findEmpleadosDeTarea()
	{
		
	$query= $this->getEntityManager()->createQuery('SELECT e  FROM UsuarioBundle:Empleado e');
	
	try{
			return $query->getResult();
		  }catch(\Doctrine\ORM\NoResultException $e){
			return null;
		  }
	}
}