<?php

interface CalculatorCommandInterface
{
    /**
     * Calculator data from left and right operands.
     *
     * @param float $left
     * @param float $right
     * @return float
     */
    public function calculate(float $left, float $right): float
}