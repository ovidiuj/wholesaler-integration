<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 26.08.19
 * Time: 21:55
 */

namespace kollex\kollex\Dataprovider\Assortment;


use Symfony\Component\Validator\ConstraintViolationListInterface;

interface ErrorHandler
{
    public function build(ConstraintViolationListInterface $violations): array;
}