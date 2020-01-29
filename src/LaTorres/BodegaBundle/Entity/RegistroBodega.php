<?php

namespace LaTorres\BodegaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroBodega
 *
 * @ORM\Table(name="registro_bodega")
 * @ORM\Entity
 */
class RegistroBodega
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_reg", type="string", length=20, nullable=true)
     */
    private $tipoReg;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle", type="string", length=100, nullable=true)
     */
    private $detalle;
	/**
     * @var \Tarea
     *
     * @ORM\ManyToOne(targetEntity="LaTorres\ProduccionBundle\Entity\Tarea", inversedBy="registroBodega")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarea_id", referencedColumnName="id")
     * })
     */
    private $tarea;

    /**
     * @var \Insumo
     *
     * @ORM\ManyToOne(targetEntity="Insumo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="insumo_id", referencedColumnName="id")
     * })
     */
    private $insumo;

	
	 /** Getters y Setters  */


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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return RegistroBodega
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return RegistroBodega
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
     * Set tipoReg
     *
     * @param string $tipoReg
     * @return RegistroBodega
     */
    public function setTipoReg($tipoReg)
    {
        $this->tipoReg = $tipoReg;
    
        return $this;
    }

    /**
     * Get tipoReg
     *
     * @return string 
     */
    public function getTipoReg()
    {
        return $this->tipoReg;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return RegistroBodega
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

    /**
     * Set tarea
     *
     * @param \LaTorres\ProduccionBundle\Entity\Tarea $tarea
     * @return RegistroBodega
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

    /**
     * Set insumo
     *
     * @param \LaTorres\BodegaBundle\Entity\Insumo $insumo
     * @return RegistroBodega
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
}