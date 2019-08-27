<?php

namespace kollex\Service;

use kollex\Entity\DataEntity;


/**
 * Class JsonService
 * @package kollex\Service
 */
class JsonService extends AbstractService
{
    /**
     * @var string
     */
    protected $jsonFilePath = __DIR__ . '/../../data/wholesaler_b.json';

    /**
     * @return array
     */
    public function getProducts(): array
    {
        $dataObject = $this->serializer->deserialize($this->getJsonContent(), 'kollex\Entity\DataEntity', 'json');
        return $this->setDataTransferObjects($dataObject->getData());
    }

    /**
     * @return string
     */
    protected function getJsonContent(): string
    {
        $jsonContent = file_get_contents($this->jsonFilePath);
        $this->validation->validate($jsonContent, DataEntity::class);
        return $jsonContent;
    }
}