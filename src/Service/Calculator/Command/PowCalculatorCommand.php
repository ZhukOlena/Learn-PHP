<?php

namespace App\Service\Calculator\Command;

class PowCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format(?float $left, ?float $right, float $result): string
    {
        return \sprintf('POW %.2f ** %.2f = %.2f', $left, $right, $result);
    }

    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
       return $left ** $right;
    }
}