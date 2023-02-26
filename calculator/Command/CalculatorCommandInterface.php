<?php

namespace Calculator\Command;

interface CalculatorCommandInterface
{
    /**
     * Calculator data from left and right operands.
     *
     * @param float|null $left
     * @param float|null $right
     * @return float
     */
    public function calculate(?float $left, ?float $right): float;

}
