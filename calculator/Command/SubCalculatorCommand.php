<?php

namespace Calculator\Command;

use Calculator\Command\CalculatorCommandInterface;

class SubCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format (?float $left, ?float $right, float $result): string
    {
        return \sprintf('%.2f - %.2f = %.2f', $left, $right, $result);
    }

    /**
     * {@inheritdoc}
     */
    public function calculate(?float $left, ?float $right): float
    {
        return $left - $right;
    }
}