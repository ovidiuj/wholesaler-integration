<?php

namespace kollex\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use kollex\kollex\Dataprovider\Assortment\Product;
use Symfony\Component\Validator\Constraints as Assert;

class JsonProductEntity implements Product
{
    /**
     * @var string
     * @Type("string")
     * @SerializedName("PRODUCT_IDENTIFIER")
     * @Assert\NotBlank
     */
    private $id;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("EAN_CODE_GTIN")
     */
    private $gtin;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("BRAND")
     * @Assert\NotBlank
     */
    private $manufacturer;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("NAME")
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("PACKAGE")
     * @Assert\Choice({"CA", "BX", "BO"})
     */
    private $packaging;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("VESSEL")
     * @Assert\Choice({"BO", "CN"})
     */
    private $baseProductPackaging;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("ADDITIONAL_INFO")
     * @Assert\Choice({"LT", "GR"})
     */
    private $baseProductUnit;

    /**
     * @var float
     * @Type("string")
     * @SerializedName("LITERS_PER_BOTTLE")
     * @Assert\NotBlank
     */
    private $baseProductAmount;

    /**
     * @var integer
     * @Type("integer")
     * @SerializedName("BOTTLE_AMOUNT")
     * @Assert\NotBlank
     */
    private $baseProductQuantity;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getGtin(): ?string
    {
        return $this->gtin;
    }

    /**
     * @param string $gtin
     */
    public function setGtin(string $gtin = null)
    {
        $this->gtin = $gtin;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer(string $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPackaging(): string
    {
        return $this->packaging;
    }

    /**
     * @param string $packaging
     */
    public function setPackaging(string $packaging)
    {
        $this->packaging = $packaging;
    }

    /**
     * @return string
     */
    public function getBaseProductPackaging(): string
    {
        return $this->baseProductPackaging;
    }

    /**
     * @param string $baseProductPackaging
     */
    public function setBaseProductPackaging(string $baseProductPackaging)
    {
        $this->baseProductPackaging = $baseProductPackaging;
    }

    /**
     * @return string
     */
    public function getBaseProductUnit(): string
    {
        return $this->baseProductUnit;
    }

    /**
     * @param string $baseProductUnit
     */
    public function setBaseProductUnit(string $baseProductUnit)
    {
        $this->baseProductUnit = $baseProductUnit;
    }

    /**
     * @return string
     */
    public function getBaseProductAmount(): string
    {
        return $this->baseProductAmount;
    }

    /**
     * @param string $baseProductAmount
     */
    public function setBaseProductAmount(string $baseProductAmount)
    {
        $this->baseProductAmount = $baseProductAmount;
    }

    /**
     * @return int
     */
    public function getBaseProductQuantity(): int
    {
        return $this->baseProductQuantity;
    }

    /**
     * @param int $baseProductQuantity
     */
    public function setBaseProductQuantity(int $baseProductQuantity)
    {
        $this->baseProductQuantity = $baseProductQuantity;
    }

}