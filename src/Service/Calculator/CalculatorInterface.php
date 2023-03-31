<?php

namespace App\Service\Calculator;

interface CalculatorInterface
{
    /**
     * Calculator specific command with left and right operands.
     *
     * @param string $command
     * @param float|null $left
     * @param float|null $right
     * @return float
     */
    public function  run(string $command, ?float $left, ?float $right): float;
}