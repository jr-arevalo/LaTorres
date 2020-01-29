<?php

namespace LaTorres\BodegaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * TipoInsumo
 *
 * @ORM\Table(name="tipo_insumo")
 * @ORM\Entity
 *@ORM\Entity(repositoryClass="LaTorres\BodegaBundle\Entity\TipoInsumoRepository")
 */
class TipoInsumo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


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
     * Set nombre
     *
     * @param string $nombre
     * @return TipoInsumo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
     ////relacion de muchos a muchos con tareas (etiquetas)
        
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="LaTorres\ProduccionBundle\Entity\TipoTarea", inversedBy="insumo",cascade={"persist"})
     * @ORM\JoinTable(name="etiqueta",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tipo_insumo_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tipo_tarea_id", referencedColumnName="id")
     *   }
     * )
     */
    private $etiquetas;
    
        
    /**
     * Add etiqueta
     *
     * @param \LaTorres\UsuarioBundle\Entity\Tarea $etiqueta
     * @return Etiqueta
     */
    public function addEtiquetas(\LaTorres\ProduccionBundle\Entity\TipoTarea $etiqueta)
    {
        $this->etiquetas[] =     $etiqueta;
    
        return $this;
    }

    /**
     * Remove etiquetas
     *
     * @param \LaTorres\UsuarioBundle\Entity\TipoTarea $etiquetas
     */
    public function removeEtiquetas(\LaTorres\ProduccionBundle\Entity\TipoTarea $etiqueta)
    {
        $this->etiquetas->removeElement($etiqueta);
    }

    public function setEtiquetas(\Doctrine\Common\Collections\Collection $etiquetas = null)
    {
        $this->etiquetas = $etiquetas;
        foreach ($etiquetas as $etiqueta) {
            $etiqueta->setTarea($this);
        }
    }
    
    /**
     * Get etiquetas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtiquetas()
    {
        return $this->etiquetas;
    }    
    
    /**
    *@var \Doctrine\Common\Collections\Collection
    * @ORM\OneToMany(targetEntity="LaTorres\BodegaBundle\Entity\Insumo", mappedBy="tipoInsumo")
    * 
    */
    protected $insumos;
    
    
      /**
     * Add insumos
     *
     * @param \LaTorres\BodegaBundle\Entity\Insumos $insumos
     * @return insumos
     */
    public function addInsumos(\LaTorres\BodegaBundle\Entity\Insumo $insumos)
    {
        $this->insumos[] = $insumos;    
        return $this;
    }
    
     public function setInsumos(\Doctrine\Common\Collections\Collection $insumos = null)
    {
        $this->insumos=$insumos;
        foreach ($insumos as $insumo) {
            $insumo->setTipoInsumo($this);
        }
        return $this;
    }
    
    public function getInsumos()
    {
        return $this->insumos;
    }
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etiquetas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->insumos =new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString(){
        return  $this->nombre;
    }   
}
