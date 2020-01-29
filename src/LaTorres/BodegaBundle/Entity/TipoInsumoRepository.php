<?php
namespace LaTorres\BodegaBundle\Entity;
use Doctrine\ORM\EntityRepository;

class TipoInsumoRepository extends EntityRepository
{
	
        public function findTiposInsumoDeTarea($idTipoTarea)
        {            
		$em = $this->getEntityManager();
		$dql = 'SELECT ti
		FROM BodegaBundle:TipoInsumo ti
                                                     JOIN ti.etiquetas e
		WHERE e.id = :id';
		$consulta = $em->createQuery($dql);
		$consulta->setParameter('id', $idTipoTarea);
		return $consulta->getResult();
        }
}