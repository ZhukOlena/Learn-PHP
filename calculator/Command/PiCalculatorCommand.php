<?php

namespace Calculator\Command;

use Calculator\Command\CalculatorCommandInterface;

class PiCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format(?float $left, ?float $right, float $result): string
    {
        return \sprintf('PI = %f', $result);
    }

    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
        return pi();
    }
}