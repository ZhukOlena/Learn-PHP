<?php

namespace Calculator\Logger;

interface CalculatorLoggerInterface
{
    /**
     * log result.
     *
     * @param string $command
     * @param float|null $left
     * @param float|null $right
     * @param float  $result
     */
    public function log(string $command, ?float $left, ?float $right, float $result): void;
}