<?php

namespace Calculator\Validator;

class NoneExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    public function  validate(?float $left, ?float $right): void
    {
    }
}