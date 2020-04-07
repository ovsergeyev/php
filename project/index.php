<?php
    $link = mysqli_connect('127.0.0.1', 'root', '', 'gbphp');

    include 'config/lib.php';
    $pages = include 'config/pages.php';
    $page = getPage($pages);

    ob_start();
    include 'pages/' . $page;
    $content = ob_get_clean();

    $html = file_get_contents('main.html');
    echo str_replace('{{CONTENT}}', $content, $html);
?>
