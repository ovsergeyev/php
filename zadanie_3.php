<?php

$regions = [];
$regions['Московская область'] = explode(',','Москва, Зеленоград, Клин');
$regions['Ленинградская область'] = explode(',','Санкт-Петербург, Всеволожск, Павловск, Кронштадт');
$regions['Рязанская область'] = explode(',','Рязань, Касимов, Скопин, Ряжск');

echo '<pre>';

foreach ($regions as $region => $cities) {
    echo "$region:" . PHP_EOL;
    echo implode($cities, ', ') . PHP_EOL;
}

echo '</pre>';
