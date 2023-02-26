<?php

use Calculator\Command\CalculatorCommandInterface;

class AddCalculatorCommand implements CalculatorCommandInterface
{
    /**
     *{@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
       return $left + $right;
    }
}
