<?php

namespace Calculator\Command;

use Calculator\Command\CalculatorCommandInterface;

class ExpCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format(?float $left, ?float $right, float $result): string
    {
       return \sprintf('EXP %.2f = %.2f', $left, $result);
    }

    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
        return exp($left);
    }
}