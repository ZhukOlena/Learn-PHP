<?php

class SqrtCalculatorCommand implements CalculatorCommandInterface
{
    public function calculate(?float $left, ?float $right): float
    {
        /**
         * {@inheritdoc }
         */
       return sqrt($left);
    }
}