<?php

use Calculator\Command\CalculatorCommandInterface;

class PiCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
        return pi();
    }
}