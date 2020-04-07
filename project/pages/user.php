<?php

$sql = "SELECT `fio`, `login`, `password`, `date` FROM `users` WHERE id=" . getId();
$response = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($response);

$html = <<<php
    Login: {$row['login']}
    <a href="?page=3&id={$row['id']}">Подробнее</a>
    <hr>
php;

echo $html;