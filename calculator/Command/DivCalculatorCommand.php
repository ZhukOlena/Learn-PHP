<?php

use Calculator\Command\CalculatorCommandInterface;

class DivCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
        return $left / $right;
    }
}