<?php

class ExpCalculatorCommand implements CalculatorCommandInterface
{
    public function calculate(?float $left, ?float $right): float
    {
        /**
         * {@inheritdoc }
         */
        return exp($left);
    }
}