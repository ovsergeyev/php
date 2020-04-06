<?php
    include 'config/lib.php';
    $pages = include 'config/pages.php';
    $page = getPage($pages);
?>

<!doctype html>
<html>
<head>
    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="?page=1">Гланая</a></li>
    <li><a href="?page=2">Пользователи</a></li>
    <li><a href="?page=3">Пользователь</a></li>
</ul>

<?php
    include 'pages/' . $page;
?>
</body>
</html>
