<?php

namespace Acme;

use src\Service\Calculator\Calculator;
use src\Service\Calculator\CalculatorCommandsRegistry;
use src\Service\Calculator\Command\AddCalculatorCommand;
use src\Service\Calculator\Command\CosCalculatorCommand;
use src\Service\Calculator\Command\DivCalculatorCommand;
use src\Service\Calculator\Command\ExpCalculatorCommand;
use src\Service\Calculator\Command\MulCalculatorCommand;
use src\Service\Calculator\Command\PiCalculatorCommand;
use src\Service\Calculator\Command\PowCalculatorCommand;
use src\Service\Calculator\Command\SinCalculatorCommand;
use src\Service\Calculator\Command\SqrtCalculatorCommand;
use src\Service\Calculator\Command\SubCalculatorCommand;
use src\Service\Calculator\Command\TanCalculatorCommand;
use src\Service\Calculator\Logger\ChainLogger;
use src\Service\Calculator\Logger\CsvLogger;
use src\Service\Calculator\Logger\DBLogger;
use src\Service\Calculator\Logger\JsonLogger;
use src\Service\Calculator\Logger\TextLogger;
use src\Service\Calculator\LogginCalculatorDecorator;
use src\Service\Calculator\Validator\LeftAndRightExistenceValidator;
use src\Service\Calculator\Validator\LeftExistenceValidator;
use src\Service\Calculator\Validator\NoneExistenceValidator;

ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include_once __DIR__ . '/autoload.php';

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
$pdo = new \PDO('mysql:host=learn-php-mysql;dbname=learn-php', 'Olena', '123' );
$logger = new ChainLogger([new JsonLogger(), new TextLogger(), new CsvLogger(), new DBLogger($pdo)]);
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

print $command->format($leftOperator, $rightOperator, $result) . PHP_EOL;







