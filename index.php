<?php
    if(!empty($_GET['id'])){
        header("Location: /image.php?id={$_GET['id']}");
    }

    function get_slider($slides_dir){
        $result = "<div class='slider'>";

        $sql = "SELECT id, name FROM gallery ORDER BY gallery.view DESC";
        $link = mysqli_connect('127.0.0.1', 'root', '', 'dz5');
        $response = mysqli_query($link, $sql);

        while($row = mysqli_fetch_assoc($response)){
            $result .= "<a target='_blank' href='index.php?id={$row["id"]}' class='slider__element'><img src='{$slides_dir}/{$row['name']}'/></a>";
        }
        return $result . "</div>";
    }

    $template = file_get_contents('template.html');
    $template = str_replace('{CONTENT}', get_slider('./img'), $template);
    echo $template;
?>