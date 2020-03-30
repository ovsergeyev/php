<?php

$tree = get_tree('./zadanie/');

function get_tree($path){
    $files = scandir($path);
    foreach ($files as $file) {
        if($file === '.' || $file === '..'){
            continue;
        }
        if(!is_file($path . $file)){

            echo "<div class='dir'><span>$file</span>";
            get_tree($path . $file . '/');
            echo "</div>";
        } else {
            echo "<div class='file'>$file</div>";
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .dir {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .dir .dir {
            padding-left: 20px;
        }
        .dir span {
            font-weight: bold;
        }
        .dir .file {
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <?php echo $tree;?>
</body>
</html>
