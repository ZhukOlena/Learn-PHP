<?php

namespace App\Service\Calculator\Validator;

interface CalculatorArgumentsValidatorInterface
{
    /**
     * Validate arguments before call calculator command.
     *
     * @param float|null $left
     * @param float|null $right
     * @return void
     */
    public function validate(?float $left, ?float $right): void;
}