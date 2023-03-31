<?php

namespace src\Service\Calculator\Command;

class SqrtCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format (?float $left, ?float $right, float $result): string
    {
        return \sprintf('SQRT %.2f = %.2f', $left, $result);
    }

    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
       return sqrt($left);
    }
}