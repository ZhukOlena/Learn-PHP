<?php

class MulCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
        return $left * $right;
    }
}
