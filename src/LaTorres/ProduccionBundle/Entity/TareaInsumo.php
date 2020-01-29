<?php

namespace LaTorres\ProduccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TareaInsumo
 *
 * @ORM\Table(name="tarea_insumo")
 * @ORM\Entity
 */
class TareaInsumo
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
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var \Insumo
     *
     * @ORM\ManyToOne(targetEntity="LaTorres\BodegaBundle\Entity\Insumo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="insumo_id", referencedColumnName="id")
     * })
     */
    private $insumo;

    /**
     * @var \Tarea
     *
     * @ORM\ManyToOne(targetEntity="Tarea", inversedBy="tareaInsumo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarea_id", referencedColumnName="id")
     * })
     */
	  
    private $tarea;



    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return TareaInsumo
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set insumo
     *
     * @param \LaTorres\BodegaBundle\Entity\Insumo $insumo
     * @return TareaInsumo
     */
    public function setInsumo(\LaTorres\BodegaBundle\Entity\Insumo $insumo = null)
    {
        $this->insumo = $insumo;
    
        return $this;
    }

    /**
     * Get insumo
     *
     * @return \LaTorres\BodegaBundle\Entity\Insumo 
     */
    public function getInsumo()
    {
        return $this->insumo;
    }

    /**
     * Set tarea
     *
     * @param \LaTorres\ProduccionBundle\Entity\Tarea $tarea
     * @return TareaInsumo
     */
    public function setTarea(\LaTorres\ProduccionBundle\Entity\Tarea $tarea = null)
    {
        $this->tarea = $tarea;
    
        return $this;
    }

    /**
     * Get tarea
     *
     * @return \LaTorres\ProduccionBundle\Entity\Tarea 
     */
    public function getTarea()
    {
        return $this->tarea;
    }
	public function __toString(){
		return  $this->cantidad."";
	}
}