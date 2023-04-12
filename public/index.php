<?php

use App\Service\Calculator\Calculator;
use App\Service\Calculator\CalculatorCommandsRegistry;
use App\Service\Calculator\Command\AddCalculatorCommand;
use App\Service\Calculator\Command\DivCalculatorCommand;
use App\Service\Calculator\Command\PiCalculatorCommand;
use App\Service\Calculator\Command\SinCalculatorCommand;
use App\Service\Calculator\Command\SubCalculatorCommand;
use App\Service\Calculator\Validator\LeftAndRightExistenceValidator;
use App\Service\Calculator\Validator\LeftExistenceValidator;
use App\Service\Calculator\Validator\NoneExistenceValidator;

include_once __DIR__.'/../config/bootstrap.php';

$path = $_SERVER['REQUEST_URI'];

if ($path === '/') {
    $controller = new \App\Controller\HomeController();
    $controller->handleAction();

    exit();
}

if (strpos($path, '/calculator') === 0) {
    $registry = new CalculatorCommandsRegistry();
    $registry->add('add', new AddCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('sub', new SubCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('div', new DivCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('pi', new PiCalculatorCommand(), new NoneExistenceValidator());
    $registry->add('sin', new SinCalculatorCommand(), new LeftExistenceValidator());

    $calculator = new Calculator($registry);

    $controller = new \App\Controller\CalculatorController($calculator);
    $controller->handleAction();

    exit();
}

print 'page not found';
exit();
