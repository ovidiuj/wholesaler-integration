<?php
namespace kollex\Service;

use Exception;
use kollex\Entity\JsonProductEntity;
use kollex\Exception\ProductEntityException;
use kollex\kollex\Dataprovider\Assortment\ErrorHandler;
use kollex\kollex\Dataprovider\Assortment\Product;
use kollex\kollex\Dataprovider\Assortment\Validation;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidationService implements Validation
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var ErrorHandler
     */
    private $errorHandler;

    /**
     * @var array
     */
    public static $packagingValues = [
        'case' => 'CA',
        'box' => 'BX',
        'bottle' => 'BO'
    ];

    /**
     * @var array
     */
    public static $baseProductPackagingValues = [
        'can' => 'CN',
        'bottle' => 'BO'
    ];

    /**
     * @var array
     */
    public static $baseProductUnitValues = [
        'liters' => 'LT',
        'grams' => 'GR'
    ];


    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        ErrorHandler $errorHandler
    ) {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->errorHandler = $errorHandler;
    }

    public function validate(string $data, string $model): object
    {
        if (!$data) {
            throw new BadRequestHttpException('Empty body.');
        }

        try {
            $object = $this->serializer->deserialize($data, $model, 'json');
        } catch (Exception $e) {
            throw new BadRequestHttpException('Invalid body.');
        }

        $errors = $this->validator->validate($object);

        if ($errors->count()) {
            throw new BadRequestHttpException(json_encode($this->errorHandler->build($errors)));
        }

        return $object;
    }

    /**
     * @param Product $entity
     * @return bool
     * @throws ProductEntityException
     */
    public function validateProduct(Product &$entity)
    {
        $baseProductPackagingValue = strtolower($entity->getBaseProductPackaging());
        if(isset(self::$baseProductPackagingValues[$baseProductPackagingValue]) === false) {
            throw new ProductEntityException("Incorrect baseProductPackaging value: $baseProductPackagingValue");
        }

        $packagingValue = strtolower(preg_replace('/[0-9\s]/', '', $entity->getPackaging()));
        if(isset(self::$packagingValues[$packagingValue]) === false) {
            throw new ProductEntityException("Incorrect Packaging value: $packagingValue");
        }

        $baseProductUnitValue = strtolower($entity->getBaseProductUnit());
        if(isset(self::$baseProductUnitValues[$baseProductUnitValue]) === false) {
            $entity->setBaseProductUnit(key(self::$baseProductUnitValues));
        }

        return true;
    }
}