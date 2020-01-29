<?php

namespace LaTorres\ProduccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoTarea
 *
 * @ORM\Table(name="tipo_tarea")
 * @ORM\Entity
 */
class TipoTarea
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle", type="string", length=20, nullable=true)
     */
    private $detalle;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="LaTorres\BodegaBundle\Entity\TipoInsumo", mappedBy="etiquetas")
     */
    protected $insumo;
    

    public function getId()
    {
        return $this->id;
    }
    
    

    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    
    }

    public function getDetalle()
    {
        return $this->detalle;
    }
	public function __toString(){
	return  $this->detalle;
	}
}
