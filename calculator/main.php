<?php

ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include_once __DIR__ . '/Command/AddCalculatorCommand.php';
include_once __DIR__ . '/Command/SubCalculatorCommand.php';
include_once __DIR__ . '/Command/DivCalculatorCommand.php';
include_once __DIR__ . '/Command/MulCalculatorCommand.php';
include_once __DIR__.'/CalculatorCommandsRegistry.php';
include_once __DIR__ . '/Calculator.php';

$registry = new CalculatorCommandsRegistry();
$registry->add('add', new AddCalculatorCommand());

$calculator = new Calculator($registry);

print $calculator->run('add', 1, 2) . PHP_EOL;
