<?php

namespace AppBundle\Entity;

use AppBundle\Repository\PricesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Prices
 * @ORM\Entity(repositoryClass="AppBundle/Repository/GoodsRepository")
 */
class Prices
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $priceTypeId;

    /**
     * @var string
     */
    private $price;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Goods
     */
    private $goods;


    /**
     * Set priceTypeId
     *
     * @param integer $priceTypeId
     * @return Prices
     */
    public function setPriceTypeId($priceTypeId)
    {
        $this->priceTypeId = $priceTypeId;

        return $this;
    }

    /**
     * Get priceTypeId
     *
     * @return integer 
     */
    public function getPriceTypeId()
    {
        return $this->priceTypeId;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Prices
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
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
     * Set goods
     *
     * @param \AppBundle\Entity\Goods $goods
     * @return Prices
     */
    public function setGoods(\AppBundle\Entity\Goods $goods = null)
    {
        $this->goods = $goods;

        return $this;
    }

    /**
     * Get goods
     *
     * @return \AppBundle\Entity\Goods 
     */
    public function getGoods()
    {
        return $this->goods;
    }
}
