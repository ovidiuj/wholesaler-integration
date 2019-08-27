<?php


namespace kollex\kollex\Dataprovider\Assortment;


interface Product
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getManufacturer(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getPackaging(): string;

    /**
     * @return string
     */
    public function getBaseProductPackaging(): string;

     /**
      * @return string
      */
    public function getBaseProductUnit(): string;

    /**
     * @return string
     */
    public function getBaseProductAmount(): string;

    /**
     * @return int
     */
    public function getBaseProductQuantity(): int;
}
