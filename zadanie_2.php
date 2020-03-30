<?php

$num = 0;
echo "$num - ноль";
$num++;

do {
    echo $num++ . " - нечетное число. <br>";
    echo $num++ . " - четное число. <br>";
} while($num <= 10);