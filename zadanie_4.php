<?php

echo mathOperation(15, 15, 'multiply');

function mathOperation($arg1, $arg2, $operation){
    $result = null;

    switch($operation){
        case 'sum':
            $result = sum($arg1, $arg2);
            break;
        case 'difference':
            $result = difference($arg1, $arg2);
            break;
        case 'multiply':
            $result = multiply($arg1, $arg2);
            break;
        case 'division':
            $result = division($arg1, $arg2);
            break;
    }

    return $result;
}

function sum($num1, $num2):int
{
    return $num1 + $num2;
}

function difference($num1, $num2):int
{
    return $num1 - $num2;
}

function multiply($num1, $num2):int
{
    return $num1 * $num2;
}

function division($num1, $num2):int
{
    return $num1 / $num2;
}