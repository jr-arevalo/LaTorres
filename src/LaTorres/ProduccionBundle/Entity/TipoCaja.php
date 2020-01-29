<?php

namespace LaTorres\ProduccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoCaja
 *
 * @ORM\Table(name="tipo_caja")
 * @ORM\Entity
 */
class TipoCaja
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return TipoCaja
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    
        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }
	public function __toString(){
	return  $this->detalle;
	}
}