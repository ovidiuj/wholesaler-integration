<?php


namespace kollex\Entity;

use JMS\Serializer\Annotation\Type;

class DataEntity
{
    /**
     * @Type("array<kollex\Entity\JsonProductEntity>")
     */
    private $data;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }


}