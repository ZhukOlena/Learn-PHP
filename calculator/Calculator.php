<?php

namespace Calculator;

use CalculatorCommandsRegistry;

class Calculator
{
    /**
     * @var CalculatorCommandsRegistry
     */
    private CalculatorCommandsRegistry $registry;

    /**
     * @param CalculatorCommandsRegistry $registry
     */
    public function __construct(CalculatorCommandsRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Run specific command
     *
     * @param string $command
     * @param float $left
     * @param float $right
     *
     * @return float
     */
    public function run(string $command, ?float $left, ?float $right): float
    {
        $calculatorCommand = $this->registry->getCommand($command);
        $commandValidator = $this->registry->getValidators($command);

        $commandValidator->validate($left, $right);

        $result = $calculatorCommand->calculate($left, $right);

        return $result;

    }
}