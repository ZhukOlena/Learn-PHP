<?php

namespace App\Service\Calculator\Validator;

class LeftExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    public function validate(?float $left, ?float $right): void
    {
        if (null === $left) {
            throw new \Exception('Missed left side.');
        }
    }
}