<?php

namespace Calculator\Command;

use Calculator\Command\CalculatorCommandInterface;

class SinCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format(?float $left, ?float $right, float $result): string
    {
       return \sprintf('SIN %.2f = %.2f', $left, $result);
    }

    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
        $radians = deg2rad($left);

        return sin($radians);
    }
}
