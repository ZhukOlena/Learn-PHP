<?php

class AddCalculatorCommand implements CalculatorCommandInterface
{
    public function calculate(float $left, float $right): float
    {
       return $left + $right;
    }
}
