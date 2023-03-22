<?php

namespace Calculator\Logger;

class DBLogger implements CalculatorLoggerInterface
{
    /**
     * @var \PDO
     */
    private \PDO $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function log(string $command, ?float $left, ?float $right, float $result): void
    {
        $sql = 'INSERT INTO calculator_history(command, left_operand, right_operand, result) VALUES (?, ?, ?, ?)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$command, $left, $right, $result]);
    }
}