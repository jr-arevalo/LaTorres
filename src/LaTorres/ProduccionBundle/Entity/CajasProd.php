<?php

namespace LaTorres\ProduccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CajasProd
 *
 * @ORM\Table(name="cajas_prod")
 * @ORM\Entity
 */
class CajasProd
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
     * @ORM\Column(name="cajas_prod", type="integer", nullable=true)
     */
    private $cajasProd;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=20, nullable=true)
     */
    private $categoria;

    /**
     * @var \Tarea
     *
     * @ORM\ManyToOne(targetEntity="Tarea", inversedBy="cajasProd")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarea_id", referencedColumnName="id")
     * })
     */
    private $tarea;

    /**
     * @var \TipoCaja
     *
     * @ORM\ManyToOne(targetEntity="TipoCaja")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_caja_id", referencedColumnName="id")
     * })
     */
    private $tipoCaja;

    /**
     * @var \MarcaCaja
     *
     * @ORM\ManyToOne(targetEntity="MarcaCaja")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="marca_caja_id", referencedColumnName="id")
     * })
     */
    private $marcaCaja;


}
