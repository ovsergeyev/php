<?php

$sql = "SELECT `id`, `fio`, `login`, `password`, `date` FROM `users`";
$response = mysqli_query($link, $sql);

$html = '';

while($row = mysqli_fetch_assoc($response)){
    $html .= <<<php
        Login: {$row['login']}
        <a href="?page=3&id={$row['id']}">Подробнее</a>
        <hr>
php;
}

echo $html;