<?php

namespace LaTorres\BodegaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


 /**
 *@ORM\Table(name="insumo")
 *@ORM\Entity
 */ 
class Insumo
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
     * @var string
     *
     * @ORM\Column(name="detalle", type="string", length=50, nullable=true)
     */
    private $detalle;

    /**
     * @var integer
     *
     * @ORM\Column(name="cant_stock", type="integer", nullable=true)
     */
    private $cantStock;


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
     * Set detalle
     *
     * @param string $detalle
     * @return Insumo
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
     * Set cantStock
     *
     * @param integer $cantStock
     * @return Insumo
     */
    public function setCantStock($cantStock)
    {
        $this->cantStock = $cantStock;
    
        return $this;
    }

    /**
     * Get cantStock
     *
     * @return integer 
     */
    public function getCantStock()
    {
        return $this->cantStock;
    }

	
    public function __toString(){
        return  $this->detalle;
    }    
    
    /**
     * @var \TipoInsumo
     *
     * @ORM\ManyToOne(targetEntity="TipoInsumo",inversedBy="insumos",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_insumo_id", referencedColumnName="id")
     * })
     */
     private $tipoInsumo;
        
     
    /**
     * Set tipoInsumo
     *
     * @param \LaTorres\ProduccionBundle\Entity\TipoInsumo $tipoInsumo
     * @return Insumo
     */
    public function setTipoInsumo(\LaTorres\BodegaBundle\Entity\TipoInsumo $tipoInsumo = null)
    {
        $this->tipoInsumo = $tipoInsumo;    
        return $this;
    }

    /**
     * Get tipoInsumo
     *
     * @return \LaTorres\ProduccionBundle\Entity\TipoInsumo 
     */
    public function getTipoInsumo()
    {
        return $this->tipoInsumo;
    }

        
}