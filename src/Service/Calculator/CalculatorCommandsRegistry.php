<?php

namespace App\Service\Calculator;

use App\Service\Calculator\Command\CalculatorCommandInterface;
use App\Service\Calculator\Validator\CalculatorArgumentsValidatorInterface;

class CalculatorCommandsRegistry
{
    /**
     * @var array<CalculatorCommandInterface>
     */
    private array $commands = [];

    /**
     * @var array<\>
     */
    private array $validators = [];

    /**
     * @param string $commandName
     * @param CalculatorCommandInterface $command
     * @param CalculatorArgumentsValidatorInterface $validator
     * @return void
     */
    public function add(string $commandName, CalculatorCommandInterface $command, CalculatorArgumentsValidatorInterface $validator): void
    {
        $this->commands[$commandName] = $command;
        $this->validators[$commandName] = $validator;
    }

    /**
     * Get calculator command from registry
     *
     * @param string $commandName
     * @return CalculatorCommandInterface
     * @throws \Exception
     */
    public function getCommand(string $commandName): CalculatorCommandInterface
    {
        if (!array_key_exists($commandName, $this->commands)){
            throw new \Exception(sprintf('Command with name "%s" was not found.', $commandName));
        }
        return $this->commands[$commandName];
    }

    /**
     * Get validator for specific command.
     *
     * @param string $commandName
     * @return \App\Service\Calculator\Validator\CalculatorArgumentsValidatorInterface
     * @throws \Exception
     */
    public function  getValidators (string $commandName): CalculatorArgumentsValidatorinterface
    {
        if (!\array_key_exists($commandName, $this->validators)) {
            throw new \Exception(\sprintf('Validator for command with name "%s" was not found.', $commandName));
        }
        return $this->validators[$commandName];
    }
}
