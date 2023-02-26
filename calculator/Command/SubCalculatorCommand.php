<?php

use Calculator\Command\CalculatorCommandInterface;

class SubCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc}
     *
     * @param float $left
     * @param float $right
     * @return float
     */
    public function calculate(?float $left, ?float $right): float
    {
        return $left - $right;
    }
}