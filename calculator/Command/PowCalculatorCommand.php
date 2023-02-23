<?php

class PowCalculatorCommand implements CalculatorCommandInterface
{
    public function calculate(?float $left, ?float $right): float
    {
        /**
         * {@inheritdoc }
         */
       return pow($left, $right);
    }
}