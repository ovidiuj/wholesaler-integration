<?php

namespace kollex\DTO;

class ProductDto
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $gtin;
    /**
     * @var string
     */
    private $manufacturer;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $packaging;
    /**
     * @var string
     */
    private $baseProductPackaging;
    /**
     * @var string
     */
    private $baseProductUnit;
    /**
     * @var float
     */
    private $baseProductAmount;
    /**
     * @var integer
     */
    private $baseProductQuantity;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * @param string $gtin
     */
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;
    }

    /**
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * @param string $packaging
     */
    public function setPackaging($packaging)
    {
        $this->packaging = $packaging;
    }

    /**
     * @return string
     */
    public function getBaseProductPackaging()
    {
        return $this->baseProductPackaging;
    }

    /**
     * @param string $baseProductPackaging
     */
    public function setBaseProductPackaging($baseProductPackaging)
    {
        $this->baseProductPackaging = $baseProductPackaging;
    }

    /**
     * @return string
     */
    public function getBaseProductUnit()
    {
        return $this->baseProductUnit;
    }

    /**
     * @param string $baseProductUnit
     */
    public function setBaseProductUnit($baseProductUnit)
    {
        $this->baseProductUnit = $baseProductUnit;
    }

    /**
     * @return float
     */
    public function getBaseProductAmount()
    {
        return $this->baseProductAmount;
    }

    /**
     * @param float $baseProductAmount
     */
    public function setBaseProductAmount($baseProductAmount)
    {
        $this->baseProductAmount = $baseProductAmount;
    }

    /**
     * @return int
     */
    public function getBaseProductQuantity()
    {
        return $this->baseProductQuantity;
    }

    /**
     * @param int $baseProductQuantity
     */
    public function setBaseProductQuantity($baseProductQuantity)
    {
        $this->baseProductQuantity = $baseProductQuantity;
    }

}