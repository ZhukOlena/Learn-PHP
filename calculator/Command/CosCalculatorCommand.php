<?php

class CosCalculatorCommand implements CalculatorCommandInterface
{
    public function calculate(?float $left, ?float $right): float
    {
        $radians = deg2rad($left);

        return cos($radians);
    }
}