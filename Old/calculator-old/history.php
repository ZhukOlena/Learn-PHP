<?php

const CALCULATOR_HISTORY_FILE_PATH = __DIR__ . '/history.json';

function calculator_history_add($command, $arguments, $result)
{
    $historyElement = [
        'command' => $command,
        'arguments' => $arguments,
        'result' => $result,
    ];

    if (file_exists(CALCULATOR_HISTORY_FILE_PATH)) {
    $historyContent = file_get_contents ( CALCULATOR_HISTORY_FILE_PATH);
        $histories = json_decode($historyContent, true);
    } else {
        $histories = [];
    }

    $histories[] = $historyElement;

    file_put_contents( CALCULATOR_HISTORY_FILE_PATH, json_encode($histories));

}