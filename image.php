<?php

function get_image($id){
    $link = mysqli_connect('127.0.0.1', 'root', '', 'dz5');
    $sql = "SELECT name, view FROM gallery WHERE id=$id";
    $response = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($response);
    $view = (int)$row['view'] + 1;
    $sql = "UPDATE gallery SET view = $view WHERE gallery.id = $id";
    mysqli_query($link, $sql);
    mysqli_close($link);
    $result = "<div class='image'><img src='img/big/{$row['name']}'/></div>";
    $result .= "<div class='view'>Количество просмотров: $view</div>";

    return $result;
}

$template = file_get_contents('template.html');

if(!empty($_GET['id'])){
    $template = str_replace('{CONTENT}', get_image($_GET['id']), $template);
}

echo $template;
?>