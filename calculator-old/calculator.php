<?php

function calculator_run()
{
    $commandInfo = calculator_get_arguments_from_command();

    if (!$commandInfo['command_name']){
       throw new Exception('No pass command as first argument');
    }

    $commandFunctions = calculator_get_command_function($commandInfo['command_name']);

    if (!$commandFunctions) {
        throw new Exception('Unknown command "'.$commandInfo['command_name'].' ".');
    }

    if (array_key_exists('validators', $commandFunctions)) {
        $validators = $commandFunctions['validators'];

        foreach ($validators as $validator) {
            call_user_func_array($validator, $commandInfo['arguments']);

        }
    }

    $result = call_user_func_array($commandFunctions['handler'], $commandInfo['arguments']);

    if ('history' !== $commandInfo['command_name']) {
        calculator_history_add($commandInfo['command_name'], $commandInfo['arguments'], $result);

        print $commandInfo['command_name']. " Result: ". $result.PHP_EOL;
    } else {
        print $result;
    }
}

function calculator_get_command_function($command)
{
    $commandRegistry = [
        'add' => [
            'handler' => 'calculator_add',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_exist_second_argument',
                'calculator_validator_first_argument_numeric',
                'calculator_validator_second_argument_numeric',
            ],
        ],

        'sub' =>[
            'handler' => 'calculator_sub',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_exist_second_argument',
                'calculator_validator_first_argument_numeric',
                'calculator_validator_second_argument_numeric',
                ],
        ],

        'mul' => [
            'handler' => 'calculator_mul',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_exist_second_argument',
                'calculator_validator_first_argument_numeric',
                'calculator_validator_second_argument_numeric',
                ],
        ],

        'div' => [
            'handler' => 'calculator_div',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_exist_second_argument',
                'calculator_validator_first_argument_numeric',
                'calculator_validator_second_argument_numeric',
                ],
        ],

        'sqrt' => [
            'handler' => 'calculator_sqrt',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],

        'exp' => [
            'handler' => 'calculator_exp',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],

        'pow' => [
            'handler' => 'calculator_pow',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_exist_second_argument',
                'calculator_validator_first_argument_numeric',
                'calculator_validator_second_argument_numeric',
                ],
        ],

        'sin' => [
            'handler' => 'calculator_sin',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],

        'cos' => [
            'handler' => 'calculator_cos',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],

        'tan' => [
            'handler' => 'calculator_tan',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
            ],

        'pi' => [
            'handler' => 'calculator_pi',
            'validators' => '',
        ],

        'ceil' => [
            'handler' => 'calculator_ceil',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],

        'floor' => [
            'handler' => 'calculator_floor',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],

        'log' => [
            'handler' => 'calculator_log',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],

        'log10' => [
            'handler' => 'calculator_log10',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],

        'log1p' => [
            'handler' => 'calculator_log1p',
            'validators' => [
                'calculator_validator_exist_first_argument',
                'calculator_validator_first_argument_numeric',
                ],
        ],
        'history' => [
            'handler' => 'calculator_history',
            'validators' => ['calculator_validator_first_argument_numeric',
                ],
        ],
    ];


    if (array_key_exists($command, $commandRegistry)) {
        return $commandRegistry[$command];
    }

    return null;
}

function calculator_get_arguments_from_command()
{
    $argumments = $_SERVER['argv'];
    array_shift($argumments);

    $commandName = array_shift($argumments);


    return [
        'command_name' => $commandName,
        'arguments' => $argumments,
    ];
}
