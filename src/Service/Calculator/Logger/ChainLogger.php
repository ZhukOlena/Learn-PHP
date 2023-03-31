<?php

 namespace App\Service\Calculator\Logger;

 class ChainLogger implements CalculatorLoggerInterface
 {
     private array $loggers;

     /**
      * @param array<CalculatorLoggerInterface> $loggers
      */
     public function __construct(array $loggers)
     {
         $this->loggers = $loggers;
     }

     public function log(string $command, ?float $left, ?float $right, float $result): void
     {
         foreach ($this->loggers as $logger) {
             $logger->log($command, $left, $right, $result);
         }
     }
 }
