<?php
    //1 вариант
    $a = 1;
    $b = 2;

    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;

    echo "$a | $b";

    echo PHP_EOL;
    //2 вариант. Деструктуризация.
    $a = 1;
    $b = 2;
    list($a,$b) = [$b,$a];

    echo "$a | $b";