<?php

namespace App\Service\Calculator\Logger;

class JsonLogger implements CalculatorLoggerInterface
{
    public function log(string $command, ?float $left, ?float $right, float $result): void
    {
        $historyFile = __DIR__.'/history.json';
        $history = [];

        if (file_exists($historyFile)) {
            $historyContent = \file_get_contents($historyFile);
            $history = \json_decode($historyContent, true);
        }

        $history[] = [
            'command' => $command,
            'arguments' => [
                'left' => $left,
                'right' => $right,
                'result' => $result
            ],
        ];

        $historyContent = json_encode($history);
        file_put_contents($historyFile, $historyContent);
    }
}