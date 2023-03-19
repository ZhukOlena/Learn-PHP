<?php

namespace Calculator\Logger;

use Calculator\Logger\CalculatorLoggerInterface;

class CsvLogger implements CalculatorLoggerInterface
{
    public function log(string $command, ?float $left, ?float $right, float $result): void
    {
        $file = __DIR__. '/history.csv';

        $line = \sprintf(
            '%s (%2f, %2f) = %2f',
            $command,
            $left,
            $right,
            $result
        ).PHP_EOL;

        \file_put_contents($file, $line, FILE_APPEND);
    }
}



