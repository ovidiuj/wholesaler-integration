<?php

namespace kollex\Service;


use kollex\Exception\SerializerException;

/**
 * Class JsonService
 * @package kollex\Service
 */
class CsvService extends AbstractService
{

    /**
     * @var string
     */
    protected $filePath = __DIR__ . '/../../data/wholesaler_a.csv';

    /**
     * @return array
     */
    public function getProducts(): array
    {
        $dataObject = $this->serializer->deserialize($this->getJsonContent(), 'array<kollex\Entity\CsvProductEntity>', 'json');
        return $this->setDataTransferObjects($dataObject);
    }

    /**
     * @return string
     */
    protected function getJsonContent(): string
    {
        $csvData = $this->csvToArray();
        $jsonContent = $this->serializer->serialize($csvData, 'json');
        return $jsonContent;
    }


    private function csvToArray($delimiter=';')
    {
        if(!file_exists($this->filePath) || !is_readable($this->filePath)) {
            return FALSE;
        }

        $header = NULL;
        $data = array();
        if (($handle = fopen($this->filePath, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine(str_replace(' ', '_', $header), $row);
            }
            fclose($handle);
        }
        return $data;
    }




}