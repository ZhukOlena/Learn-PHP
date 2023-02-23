<?php

ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include_once __DIR__.'/Command/CalculatorCommandInterface.php';
include_once __DIR__ . '/Command/AddCalculatorCommand.php';
include_once __DIR__. '/Command/CosCalculatorCommand.php';
include_once __DIR__. '/Command/ExpCalculatorCommand.php';
include_once __DIR__ . '/Command/SubCalculatorCommand.php';
include_once __DIR__ . '/Command/DivCalculatorCommand.php';
include_once __DIR__ . '/Command/MulCalculatorCommand.php';
include_once __DIR__. '/Command/PiCalculatorCommand.php';
include_once __DIR__. '/Command/PowCalculatorCommand.php';
include_once __DIR__. '/Command/SinCalculatorCommand.php';
include_once __DIR__. '/Command/SqrtCalculatorCommand.php';
include_once __DIR__. '/Command/TanCalculatorCommand.php';
include_once __DIR__ . '/CalculatorCommandsRegistry.php';
include_once __DIR__ . '/Calculator.php';


$registry = new CalculatorCommandsRegistry();
$registry->add('add', new AddCalculatorCommand());
$registry->add('cos', new CosCalculatorCommand());
$registry->add('exp', new ExpCalculatorCommand());
$registry->add('sub', new SubCalculatorCommand());
$registry->add('div', new DivCalculatorCommand());
$registry->add('mul', new MulCalculatorCommand());
$registry->add('pi', new PiCalculatorCommand());
$registry->add('pow', new PowCalculatorCommand());
$registry->add('sin', new SinCalculatorCommand());
$registry->add('sqrt', new SqrtCalculatorCommand());
$registry->add('tan', new TanCalculatorCommand());

$calculator = new Calculator($registry);

$arguments = $_SERVER['argv'];

array_shift($arguments);

if (!count($arguments)) {
    throw new Exception('Missed some arguments');
}

$commandName = $arguments[0];
$leftOperator = array_key_exists(1, $arguments) ? $arguments[1]: null;
$rightOperator = array_key_exists(2, $arguments) ? $arguments[2]: null;

if ($leftOperator && !is_numeric($leftOperator)) {
    throw new Exception(sprintf(
        'left operand is not numeric. Give "%s".',
        $leftOperator
    ));
}

if ($rightOperator && !is_numeric($rightOperator)) {
    throw new Exception(sprintf(
        'Right operand is not numeric. Give "%s".',
            $rightOperator
        ));
}

$result = $calculator->run($commandName, $leftOperator, $rightOperator);

print sprintf(
    'Command: "%s"; (Left: %f, Right: %f). Result: %f',
    $commandName,
    $leftOperator,
    $rightOperator,
    $result
).PHP_EOL;


