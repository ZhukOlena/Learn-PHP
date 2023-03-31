<?php

namespace App\Service\Calculator\Validator;

class NoneExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    public function  validate(?float $left, ?float $right): void
    {
    }
}