<?php

    function get_slider($slides_dir){
        $result = "<div class='slider'>";

        $sql = "SELECT id, name FROM gallery";
        $link = mysqli_connect('127.0.0.1', 'root', '', 'dz5');
        $response = mysqli_query($link, $sql);

        while($row = mysqli_fetch_assoc($response)){
            $result .= "<a target='_blank' href='?id={$row["id"]}' class='slider__element'><img src='{$slides_dir}/{$row['name']}'/></a>";
        }
        return $result . "</div>";
    }

    function get_image($id){
        $link = mysqli_connect('127.0.0.1', 'root', '', 'dz5');
        $sql = "SELECT name FROM gallery WHERE id=$id";
        $response = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($response);
        $result = "<div class='image'><img src='img/big/{$row['name']}'/></div>";
        return $result;
    }

    $template = file_get_contents('template.html');

    if(!empty($_GET['id'])){
        $template = str_replace('{CONTENT}', get_image($_GET['id']), $template);
    } else {
        $template = str_replace('{CONTENT}', get_slider('./img'), $template);
    }

    echo $template;
?>