<?php

use Calculator\Command\CalculatorCommandInterface;

class SinCalculatorCommand implements CalculatorCommandInterface
{
    public function calculate(?float $left, ?float $right): float
    {
        /**
         * {@inheritdoc }
         */
        $radians = deg2rad($left);

        return sin($radians);
    }
}
