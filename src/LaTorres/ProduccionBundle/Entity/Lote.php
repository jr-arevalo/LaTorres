<?php

namespace LaTorres\ProduccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lote
 *
 * @ORM\Table(name="lote")
 * @ORM\Entity
 */
class Lote
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
     * @ORM\Column(name="area", type="integer", nullable=true)
     */
    private $area;

    /**
     * @var \Finca
     *
     * @ORM\ManyToOne(targetEntity="Finca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="finca_id", referencedColumnName="id")
     * })
     */
    private $finca;



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
     * Set area
     *
     * @param integer $area
     * @return Lote
     */
    public function setArea($area)
    {
        $this->area = $area;
    
        return $this;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set finca
     *
     * @param \LaTorres\ProduccionBundle\Entity\Finca $finca
     * @return Lote
     */
    public function setFinca(\LaTorres\ProduccionBundle\Entity\Finca $finca = null)
    {
        $this->finca = $finca;
    
        return $this;
    }

    /**
     * Get finca
     *
     * @return \LaTorres\ProduccionBundle\Entity\Finca 
     */
    public function getFinca()
    {
        return $this->finca;
    }
	public function __toString(){
	return  $this->id;
	}
}