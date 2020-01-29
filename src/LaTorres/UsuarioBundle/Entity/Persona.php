<?php

namespace LaTorres\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 *@ORM\Table
 *@ORM\Entity
 *@ORM\InheritanceType("JOINED")
 *@ORM\DiscriminatorColumn(name="tipo_per", type="string")
 *@ORM\DiscriminatorMap({"usuario" = "Usuario", "empleado" = "Empleado"})
 * 
 */ 
class Persona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=50, nullable=true)
     */
    protected $apellido;
	
	/**Getters y Setters*/

	public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
	
	public function __toString(){
		return  $this->nombre." ".$this->apellido;
	}
}
