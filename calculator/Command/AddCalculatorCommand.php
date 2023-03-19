<?php

namespace Calculator\Command;

class AddCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format(?float $left, ?float $right, float $result): string
    {
        return \sprintf ('%.2f + %.2f = %.2f', $left, $right, $result);
    }

    /**
     *{@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
       return $left + $right;
    }
}
