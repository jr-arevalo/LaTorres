<?php

namespace LaTorres\ProduccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


 /**
 *@ORM\Table(name="tarea")
 *@ORM\Entity
 *@ORM\Entity(repositoryClass="LaTorres\ProduccionBundle\Entity\TareaRepository")
 */ 
class Tarea
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \TipoTarea
     *
     * @ORM\ManyToOne(targetEntity="TipoTarea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_tarea_id", referencedColumnName="id")
     * })
     */
     private $tipoTarea;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="LaTorres\UsuarioBundle\Entity\Empleado", inversedBy="tarea",cascade={"persist"})
     * @ORM\JoinTable(name="asignacion",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tarea_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     *   }
     * )
     */
    private $empleado;

    /**
     * @var \Lote
     *
     * @ORM\ManyToOne(targetEntity="Lote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lote_id", referencedColumnName="id")
     * })
     */
    private $lote;
	/**
    *@var \Doctrine\Common\Collections\Collection
	* @ORM\OneToMany(targetEntity="LaTorres\BodegaBundle\Entity\RegistroBodega", 
	*mappedBy="tarea", cascade={"persist", "remove"})
    * 
    */
    protected $registroBodega;
	
	/**
    *@var \Doctrine\Common\Collections\Collection
	* @ORM\OneToMany(targetEntity="CajasProd", 
	*mappedBy="tarea", cascade={"persist", "remove"})
    * 
    */
    protected $cajasProd;
 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->empleado = new \Doctrine\Common\Collections\ArrayCollection();
		 $this->registroBodega = new \Doctrine\Common\Collections\ArrayCollection();
		  $this->cajasProd = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Tarea
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Tarea
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
     * Set tipoTarea
     *
     * @param \LaTorres\ProduccionBundle\Entity\TipoTarea $tipoTarea
     * @return Tarea
     */
    public function setTipoTarea(\LaTorres\ProduccionBundle\Entity\TipoTarea $tipoTarea = null)
    {
        $this->tipoTarea = $tipoTarea;
    
        return $this;
    }

    /**
     * Get tipoTarea
     *
     * @return \LaTorres\ProduccionBundle\Entity\TipoTarea 
     */
    public function getTipoTarea()
    {
        return $this->tipoTarea;
    }

    /**
     * Add empleado
     *
     * @param \LaTorres\UsuarioBundle\Entity\Empleado $empleado
     * @return Tarea
     */
    public function addEmpleado(\LaTorres\UsuarioBundle\Entity\Empleado $empleado)
    {
        $this->empleado[] = $empleado;
    
        return $this;
    }

    /**
     * Remove empleado
     *
     * @param \LaTorres\UsuarioBundle\Entity\Empleado $empleado
     */
    public function removeEmpleado(\LaTorres\UsuarioBundle\Entity\Empleado $empleado)
    {
        $this->empleado->removeElement($empleado);
    }

    /**
     * Get empleado
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

      /**
     * Add registroBodega
     *
     * @param \LaTorres\BodegaBundle\Entity\RegistroBodega $registroBodega
     * @return registroBodega
     */
    public function addRegistroBodega(\LaTorres\BodegaBundle\Entity\RegistroBodega $registroBodega)
    {
        $this->registroBodega[] = $registroBodega;
    
        return $this;
    }
    
     public function setRegistroBodega(\Doctrine\Common\Collections\Collection $registros )
    {
        $this->registroBodega = $registros;
        foreach ($registros as $registroBodega) {
            $registroBodega->setTarea($this);
        }
        return $this;
    }
    
    public function getRegistroBodega()
    {
        return $this->registroBodega;
    }
    	
    public function setCajasProd(\Doctrine\Common\Collections\Collection $cajas = null)
    {
        $this->cajasProd = $cajas;
        foreach ($cajas as $cajasProd) {
            $cajasProd->setTarea($this);
        }
        return $this;
    }
	 public function getCajasProd()
    {
        return $this->cajasProd;
    }
    /**
     * Set lote
     *
     * @param \LaTorres\ProduccionBundle\Entity\Lote $lote
     * @return Tarea
     */
    public function setLote(\LaTorres\ProduccionBundle\Entity\Lote $lote = null)
    {
        $this->lote = $lote;
    
        return $this;
    }

    /**
     * Get lote
     *
     * @return \LaTorres\ProduccionBundle\Entity\Lote 
     */
    public function getLote()
    {
        return $this->lote;
    }
}