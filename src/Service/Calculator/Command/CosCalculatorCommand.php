<?php

namespace App\Service\Calculator\Command;

class CosCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * {@inheritdoc }
     */
    public function format (?float $left, ?float $right, float $result): string
    {
        return \sprintf('COS %.2f = %.2f', $left, $result);
    }

    /**
     * {@inheritdoc }
     */
    public function calculate(?float $left, ?float $right): float
    {
        $radians = deg2rad($left);

        return cos($radians);
    }
}