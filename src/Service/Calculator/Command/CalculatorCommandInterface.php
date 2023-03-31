<?php

namespace App\Service\Calculator\Command;

interface CalculatorCommandInterface
{
    /**
     * Format command to string.
     *
     * @param float|null $left
     * @param float|null $right
     * @param float $result
     *
     * @return string
     */
    public function format(?float $left, ?float $right, float $result): string;

    /**
     * Calculator data from left and right operands.
     *
     * @param float|null $left
     * @param float|null $right
     * @return float
     */
    public function calculate(?float $left, ?float $right): float;

}
