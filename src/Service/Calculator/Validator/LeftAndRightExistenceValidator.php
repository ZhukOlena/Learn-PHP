<?php

namespace App\Service\Calculator\Validator;

class LeftAndRightExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    public function validate(?float $left, ?float $right): void
    {
        if (null === $left) {
            throw new \Exception('Missed left side.');
        }

        if (null === $right) {
            throw new \Exception('Missed right side.');
        }
    }
}