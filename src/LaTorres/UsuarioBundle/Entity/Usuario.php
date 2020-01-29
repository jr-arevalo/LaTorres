<?php

namespace LaTorres\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario extends Persona implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="tipo_usuario", type="string", length=20, nullable=true)
     */
    protected $tipoUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=true)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=true)
     */
    protected $password;

	/**funciones de la interfaz UserInterface*/
	function eraseCredentials()
	{
	}
	function getRoles()
	{
	return array('ROLE_USUARIO');
	}
	function getSalt()
	{
	return null;
	}
	
	public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    
    }

    /**     Getters y Setters     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    
     }
    
    public function getPassword()
    {
        return $this->password;
    }
}