<?php

function calculator_add($a, $b)
{
    return $a + $b;
}

function calculator_sub($a, $b)
{
    return $a - $b;
}

function calculator_div($a, $b)
{
    return $a / $b;
}

function calculator_mul($a, $b)
{
    return $a * $b;
}

function calculator_sqrt($a):float
{
    return sqrt($a);
}

function calculator_exp($a):float
{
    return exp($a);
}

function calculator_pow($a, $b)
{
    return pow($a, $b);
}

function calculator_sin($a)
{
    $radians = deg2rad($a);

    return sin($radians);
}

function calculator_cos($a):float
{
    $radians = deg2rad($a);

    return cos($radians);
}

function calculator_tan($a):float
{
    $radians = deg2rad($a);

    return tan($radians);
}

function calculator_pi():float
{
    return pi();
}

function calculator_ceil($a)
{
    return ceil($a);
}

function calculator_floor($a)
{
    return floor($a);
}

function calculator_log($a):float
{
    return log($a);
}

function calculator_log10($a):float
{
    return log10($a);
}

function calculator_log1p($a):float
{
    return log1p($a);
}