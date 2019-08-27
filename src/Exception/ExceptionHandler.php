<?php

namespace kollex\Exception;

use kollex\kollex\Dataprovider\Assortment\ErrorHandler;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ExceptionHandler implements ErrorHandler
{

    /**
     * @param ConstraintViolationListInterface $violations
     * @return array
     */
    public function build(ConstraintViolationListInterface $violations): array
    {
        $errors = [];

        /** @var ConstraintViolation $violation */
        foreach ($violations as $violation) {
            $errors[
            $this->makeSnakeCase($violation->getPropertyPath())
            ] = $violation->getMessage();
        }

        return $this->buildMessages($errors);
    }

    /**
     * @param array $errors
     * @return array
     */
    private function buildMessages(array $errors): array
    {
        $result = [];

        foreach ($errors as $path => $message) {
            $temp = &$result;

            foreach (explode('.', $path) as $key) {
                preg_match('/(.*)(\[.*?\])/', $key, $matches);
                if ($matches) {
                    $index = str_replace(['[', ']'], '', $matches[2]);
                    $temp = &$temp[$matches[1]][$index];
                } else {
                    $temp = &$temp[$key];
                }
            }

            $temp = $message;
        }

        return $result;
    }

    /**
     * @param string $text
     * @return string
     */
    private function makeSnakeCase(string $text): string
    {
        if (!trim($text)) {
            return $text;
        }

        return strtolower(preg_replace('~(?<=\\w)([A-Z])~', '_$1', $text));
    }

}