<?php

namespace App\Service\Calculator\Logger;

class TextLogger implements CalculatorLoggerInterface
{
    public function log(string $command, ?float $left, ?float $right, float $result): void
    {
        $file = __DIR__.'/history.txt';

        $line = \sprintf(
            '%s (%.2f, %.2f) = %.2f',
            $command,
            $left,
            $right,
            $result
        ).PHP_EOL;

        \file_put_contents($file, $line, FILE_APPEND);
    }
}
