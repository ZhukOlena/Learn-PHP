<?php

class CalculatorCommandsRegistry
{
    /**
     * @var array<CalculatorCommandInterface>
     */
    private array $commands = [];

    public function add(string $commandName, CalculatorCommandInterface $command): void
    {
        $this->commands[$commandName] = $command;
    }

    /**
     * Get calculator command from registry
     *
     * @param string $commandName
     * @return CalculatorCommandInterface
     * @throws Exception
     */
    public function get(string $commandName): CalculatorCommandInterface
    {
        if (!array_key_exists($commandName, $this->commands)){
            throw new Exception(sprintf('Command with name "%s" was not found.', $commandName));
        }
        return $this->commands[$commandName];
    }

}
