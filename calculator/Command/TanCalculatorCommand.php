<?php

use Calculator\Command\CalculatorCommandInterface;

class TanCalculatorCommand implements CalculatorCommandInterface
{
    public function calculate(?float $left, ?float $right): float
    {
        $radians = deg2rad($left);

        return tan($radians);
    }
}