<?php

namespace Acme;

use Calculator\Calculator;
use Calculator\CalculatorCommandsRegistry;
use Calculator\Command\AddCalculatorCommand;
use Calculator\Command\CosCalculatorCommand;
use Calculator\Command\DivCalculatorCommand;
use Calculator\Command\ExpCalculatorCommand;
use Calculator\Command\MulCalculatorCommand;
use Calculator\Command\PiCalculatorCommand;
use Calculator\Command\PowCalculatorCommand;
use Calculator\Command\SinCalculatorCommand;
use Calculator\Command\SqrtCalculatorCommand;
use Calculator\Command\SubCalculatorCommand;
use Calculator\Command\TanCalculatorCommand;
use Calculator\Logger\ChainLogger;
use Calculator\Logger\CsvLogger;
use Calculator\Logger\JsonLogger;
use Calculator\LogginCalculatorDecorator;
use Calculator\Logger\TextLogger;
use Calculator\Validator\LeftAndRightExistenceValidator;
use Calculator\Validator\LeftExistenceValidator;
use Calculator\Validator\NoneExistenceValidator;

ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include_once  __DIR__.'/autoload.php';

$registry = new CalculatorCommandsRegistry();
$registry->add('add', new AddCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('cos', new CosCalculatorCommand(), new LeftExistenceValidator());
$registry->add('exp', new ExpCalculatorCommand(), new LeftExistenceValidator());
$registry->add('sub', new SubCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('div', new DivCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('mul', new MulCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('pi', new PiCalculatorCommand(), new NoneExistenceValidator());
$registry->add('pow', new PowCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('sin', new SinCalculatorCommand(), new LeftExistenceValidator());
$registry->add('sqrt', new SqrtCalculatorCommand(), new LeftExistenceValidator());
$registry->add('tan', new TanCalculatorCommand(), new LeftExistenceValidator());

$calculator = new Calculator($registry);
$logger = new ChainLogger([new JsonLogger(), new TextLogger(), new CsvLogger()]);
$calculator = new LogginCalculatorDecorator($calculator, $logger);


$arguments = $_SERVER['argv'];

array_shift($arguments);

if (!count($arguments)) {
    throw new \Exception('Missed some arguments');
}

$commandName = $arguments[0];
$leftOperator = array_key_exists(1, $arguments) ? $arguments[1]: null;
$rightOperator = array_key_exists(2, $arguments) ? $arguments[2]: null;

if ($leftOperator && !is_numeric($leftOperator)) {
    throw new \Exception(sprintf(
        'left operand is not numeric. Give "%s".',
        $leftOperator
    ));
}

if ($rightOperator && !is_numeric($rightOperator)) {
    throw new \Exception(sprintf(
        'Right operand is not numeric. Give "%s".',
            $rightOperator
        ));
}

$result = $calculator->run($commandName, $leftOperator, $rightOperator);
$command = $registry->getCommand($commandName);

print $command->format($leftOperator, $rightOperator, $result).PHP_EOL;







