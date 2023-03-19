<?php

namespace Calculator\Command;

use Calculator\Command\CalculatorCommandInterface;

class TanCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format(?float $left, ?float $right, float $result): string
    {
        return \sprintf('TAN %.2f = %.2f', $left, $result);
    }

    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
        $radians = deg2rad($left);

        return tan($radians);
    }
}