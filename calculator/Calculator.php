<?php

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
    public function run(string $command, float $left, float $right): float
    {
        $calculatorCommand = $this->registry->get($command);

        $result = $calculatorCommand->calculate($left, $right);

        return $result;

    }
}