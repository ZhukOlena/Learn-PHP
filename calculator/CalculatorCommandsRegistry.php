<?php

use Calculator\Command\CalculatorCommandInterface;

class CalculatorCommandsRegistry
{
    /**
     * @var array<CalculatorCommandInterface>
     */
    private array $commands = [];

    /**
     * @var array<\Calculator\Validator\CalculatorArgumentsValidatorInterface>
     */
    private array $validators = [];

    /**
     * @param string $commandName
     * @param CalculatorCommandInterface $command
     * @param \Calculator\Validator\CalculatorArgumentsValidatorInterface $validator
     */
    public function add(string $commandName, CalculatorCommandInterface $command, \Calculator\Validator\CalculatorArgumentsValidatorInterface $validator): void
    {
        $this->commands[$commandName] = $command;
        $this->validators[$commandName] = $validator;
    }

    /**
     * Get calculator command from registry
     *
     * @param string $commandName
     * @return CalculatorCommandInterface
     * @throws Exception
     */
    public function getCommand(string $commandName): \Calculator\Command\CalculatorCommandInterface
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
     * @return \Calculator\Validator\CalculatorArgumentsValidatorInterface
     * @throws \Exception
     */
    public function  getValidators (string $commandName): \Calculator\Validator\CalculatorArgumentsValidatorInterface
    {
        if (!\array_key_exists($commandName, $this->validators)) {
            throw new \Exception(\sprintf('Validator for command with name "%s" was not found.', $commandName));
        }
        return $this->validators[$commandName];
    }

}
