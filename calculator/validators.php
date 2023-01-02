<?php

function calculator_validator_exist_first_argument($a = null)
{
    if ($a === null) {
        throw new Exception('Missed first argument');
    }
}

function calculator_validator_exist_second_argument($a = null, $b = null)
{
    if ($b === null) {
        throw new Exception('Missed second arguments');
    }
}

function calculator_validator_first_argument_numeric($a = null)
{
    if ($a !== null && !is_numeric($a)) {
        throw new Exception('First ardument must be a numeric');
    }
}

function calculator_validator_second_argument_numeric($a = null, $b = null)
{
    if ($b !== null && !is_numeric($b)) {
        throw new Exception('Second argumenr must be a numeric');
    }
}










//function calculator_two_arg_validator($a = null, $b = null)
//{
//    if ($a === null || $b === null) {
//        print 'Missed few arguments.'.PHP_EOL;
//        exit(1);
//    }
//
//    if (!is_numeric($a) || !is_numeric($b)) {
//        print 'Invalid arguments. Must be a numeric.'.PHP_EOL;
//        exit(1);
//    }
//};
//
//
//function calculator_one_arg_validator($a = null)
//{
//    if ($a === null) {
//        print 'Missed few arguments.'.PHP_EOL;
//        exit(1);
//    }
//    if (!is_numeric($a)) {
//        print 'Invalid arguments. must be a numeric.'.PHP_EOL;
//        exit(1);
//    }
//}



