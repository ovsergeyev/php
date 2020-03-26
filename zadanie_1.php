<?php
    //$a = rand(PHP_INT_MIN, PHP_INT_MAX);
    //$b = rand(PHP_INT_MIN, PHP_INT_MAX);
    $a = rand(-100, 100);
    $b = rand(-100, 100);

    if($a >= 0 && $b >= 0){
        echo difference($a, $b);
    } elseif($a < 0 && $b < 0) {
        echo multiply($a, $b);
    } else {
        echo sum($a, $b);
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

