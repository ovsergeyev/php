<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $login    = $_POST['login'];
      $password = $_POST['password'];
      $date     = $_POST['date'];

      $sql = "INSERT INTO users
            (login, password, date)
      VALUES
            ('$login', '$password', '$date')";

      mysqli_query($link, $sql);

      header('Location: ?page=2');
      exit;
    }
?>

<form action="?page=4" method="post">
    <input type="text" name="login">
    <input type="text" name="password">
    <input type="date" name="date">
    <input type="submit">
</form>