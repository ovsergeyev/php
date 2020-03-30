<?php

//. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

$str = 'Проверка проверка';
function space_to_underscore($string){
    return str_replace(' ', '_', $string);
}

echo space_to_underscore($str);