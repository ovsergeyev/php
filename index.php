<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'gbphp' );


if(!empty($_GET['login']) && !empty($_GET['password']) && !empty($_GET['date'])){
    $login = $_GET['login'];
    $password = $_GET['password'];
    $date = $_GET['date'];


    $sql = "INSERT INTO `users`
        (login, password, date)
        VALUES
        ('$login', '$password', '$date')"
    ;

//    echo $sql;

    mysqli_query($link, $sql) or die(mysqli_error($link));

    header('Location: /php1.2');
    exit;
}

if(!empty($_GET['del'])){
    $sql = "DELETE FROM `users` WHERE `users`.`id` = {$_GET['del']}";
    mysqli_query($link, $sql) or die(mysqli_errno($link));
    header('Location: /php1.2');
}

$sql = "SELECT `id`, `fio`, `login`, `password`, `date` FROM `users`";
$response = mysqli_query($link, $sql);

//$row = mysqli_fetch_assoc($response);//Сдвигается указатель. Если нет значения null.
//var_dump($row);

while($row = mysqli_fetch_assoc($response)){
    echo <<<php
        Login: {$row['login']}
        <a href="?del={$row['id']}">Удалить</a>
        <hr>
php;
}

var_dump($_GET);

?>

<form>
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="date" name="date">
    <button type="submit">Отправить</button>
</form>
