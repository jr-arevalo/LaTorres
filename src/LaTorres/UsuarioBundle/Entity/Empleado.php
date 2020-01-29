<?php

namespace LaTorres\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado
 *
 * @ORM\Table(name="empleado")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="LaTorres\UsuarioBundle\Entity\EmpleadoRepository")
 */
class Empleado extends Persona
{
    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=10, nullable=true)
     */
    protected $telefono;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="LaTorres\ProduccionBundle\Entity\Tarea", mappedBy="empleado")
     */
    protected $tarea;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tarea = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Empleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }



    /**
     * Add tarea
     *
     * @param \LaTorres\ProduccionBundle\Entity\Tarea $tarea
     * @return Empleado
     */
    public function addTarea(\LaTorres\ProduccionBundle\Entity\Tarea $tarea)
    {
        $this->tarea[] = $tarea;
    
        return $this;
    }

    /**
     * Remove tarea
     *
     * @param \LaTorres\ProduccionBundle\Entity\Tarea $tarea
     */
    public function removeTarea(\LaTorres\ProduccionBundle\Entity\Tarea $tarea)
    {
        $this->tarea->removeElement($tarea);
    }

    /**
     * Get tarea
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTarea()
    {
        return $this->tarea;
    }
	
}