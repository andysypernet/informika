<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photos
 * @ORM\Entity(repositoryClass="AppBundle/Repository/GoodsRepository")
 */
class Photos
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Goods", mappedBy="id")
     */
    private $goodsId;

    /**
     * @var string
     */
    private $basename;


    /**
     * Set goodsId
     *
     * @param integer $goodsId
     * @return Photos
     */
    public function setGoodsId($goodsId)
    {
        $this->goodsId = $goodsId;

        return $this;
    }

    /**
     * Get goodsId
     *
     * @return integer 
     */
    public function getGoodsId()
    {
        return $this->goodsId;
    }

    /**
     * Set basename
     *
     * @param string $basename
     * @return Photos
     */
    public function setBasename($basename)
    {
        $this->basename = $basename;

        return $this;
    }

    /**
     * Get basename
     *
     * @return string 
     */
    public function getBasename()
    {
        return $this->basename;
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
}
