<?php

namespace App\Controller;

use App\Service\Calculator\Calculator;
use App\Service\Calculator\CalculatorCommandsRegistry;
use App\Service\Calculator\CalculatorInterface;
use App\Service\Calculator\Command\AddCalculatorCommand;
use App\Service\Calculator\Command\DivCalculatorCommand;
use App\Service\Calculator\Command\PiCalculatorCommand;
use App\Service\Calculator\Command\SinCalculatorCommand;
use App\Service\Calculator\Command\SubCalculatorCommand;
use App\Service\Calculator\Validator\LeftAndRightExistenceValidator;
use App\Service\Calculator\Validator\LeftExistenceValidator;
use App\Service\Calculator\Validator\NoneExistenceValidator;

class CalculatorController
{
    private CalculatorInterface $calculator;

    public function __construct(CalculatorInterface  $calculator)
    {
        $this->calculator = $calculator;

    }
    public function handleAction()
    {
        $command = null;
        $leftOperand = null;
        $rightOperand = null;
        $result = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $command = $_POST['command'];
            $leftOperand = (float) $_POST['left'];
            $rightOperand = (float) $_POST['right'];

            $result = $this->calculator->run($command, $leftOperand, $rightOperand);
        }

        include __DIR__.'/../Resources/views/calculator.php';
    }
}
