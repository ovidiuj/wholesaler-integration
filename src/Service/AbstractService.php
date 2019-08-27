<?php

namespace kollex\Service;

use kollex\DTO\ProductDto;
use kollex\Exception\SerializerException;
use kollex\kollex\Dataprovider\Assortment\DataProvider;
use kollex\kollex\Dataprovider\Assortment\Product;
use JMS\Serializer\SerializerBuilder;

/**
 * Class JsonService
 * @package kollex\Service
 */
abstract class AbstractService implements DataProvider
{

    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    protected $serializer;

    /**
     * @var ValidationService
     */
    protected $validation;

    /**
     * @var string
     */
    protected $filePath;

    /**
     * JsonService constructor.
     * @param ValidationService $validation
     */
    public function __construct(ValidationService $validation)
    {
        $this->serializer = SerializerBuilder::create()->build();
        $this->validation = $validation;
    }

    /**
     * @param array $data
     * @return string
     */
    public function getJsonResponse(array $data)
    {
        return $this->serializer->serialize($data, 'json');
    }

    /**
     * @param $entities
     * @return array
     */
    protected function setDataTransferObjects($entities)
    {
        $dtoObjects = [];
        foreach ($entities as $entity) {
            $dtoObjects[] = $this->createProductDto($entity);
        }
        return $dtoObjects;
    }

    /**
     * @param $entity
     * @return ProductDto
     */
    private function createProductDto($entity)
    {
        $productDTO = null;
        if($entity instanceof Product && $this->validation->validateProduct($entity) === true) {

            $productDTO = new ProductDto();
            $productDTO->setId($entity->getId());
            $productDTO->setBaseProductAmount($entity->getBaseProductAmount());

            $baseProductPackagingValue = strtolower($entity->getBaseProductPackaging());
            $productDTO->setBaseProductPackaging(ValidationService::$baseProductPackagingValues[$baseProductPackagingValue]);
            $productDTO->setBaseProductQuantity($entity->getBaseProductQuantity());

            $baseProductUnitValue = strtolower($entity->getBaseProductUnit());
            $productDTO->setBaseProductUnit(ValidationService::$baseProductUnitValues[$baseProductUnitValue]);
            $productDTO->setGtin($entity->getGtin());
            $productDTO->setManufacturer($entity->getManufacturer());
            $productDTO->setName($entity->getName());

            $packagingValue = strtolower(preg_replace('/[0-9\s]/', '', $entity->getPackaging()));
            $productDTO->setPackaging(ValidationService::$packagingValues[$packagingValue]);
        }
        return $productDTO;
    }

    /**
     * @return array
     */
    abstract public function getProducts(): array;

    /**
     * @return string
     */
    abstract protected function getJsonContent(): string;
}