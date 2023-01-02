<?php

include_once __DIR__.'/operators.php';
include_once __DIR__.'/calculator.php';
include_once __DIR__.'/validators.php';

ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);

try {
    calculator_run();
} catch (Exception $error) {
    print 'Error run calculator'. PHP_EOL;
    print $error->getMessage().PHP_EOL;
    exit(1);
}




