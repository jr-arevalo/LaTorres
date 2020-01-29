<?php

namespace LaTorres\ProduccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corte
 *
 * @ORM\Table(name="corte")
 * @ORM\Entity
 */
class Corte extends Tarea
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cant_perdido", type="integer", nullable=true)
     */
    private $cantPerdido;

    /**
     * @var integer
     *
     * @ORM\Column(name="cant_recuperado", type="integer", nullable=true)
     */
    private $cantRecuperado;

}