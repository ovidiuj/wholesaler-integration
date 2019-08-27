<?php


namespace kollex\kollex\Dataprovider\Assortment;


interface Validation
{
    public function validate(string $data, string $model): object;
}