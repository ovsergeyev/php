<?php

load_img('./slides/');
logging('./log/');

function logging($path){
    $counter = 1;
    $base_name = $path . 'log';
    $file_name = null;
    while(file_exists($base_name . $counter . '.txt')){
        $counter++;
    }
    if(get_count_lines($base_name . ($counter - 1) . '.txt') >= 10){
        $file_name = $base_name . $counter . '.txt';
    } else {
        if($counter > 1) $counter --;
        $file_name = $base_name . $counter . '.txt';
    }
    $date = date('Y-m-d H:i:s');
    $message = $date . ' Обращение к файлу index.php' . PHP_EOL;
    file_put_contents($file_name, $message, FILE_APPEND);
}

function get_count_lines($path){
    if(file_exists($path)){
        $file = file($path);
        return count($file);
    }
    return false;
}

function load_img($load_path){
    $img_types = ['image/jpeg', 'image/png'];
    if($_FILES['file']){
        $file = $_FILES['file'];
        if(!in_array($file['type'], $img_types)){
            return false;
        }
        $path_src = $_FILES['file']['tmp_name'];
        $name = translit($_FILES['file']['name']);
        copy($path_src, $load_path . $name);
    }
}

function get_slider($slides_dir){
    $result = "<div class='slider'>";
    $slides = scandir($slides_dir);
    foreach($slides as $slide){
        if($slide == '.' || $slide == '..'){
            continue;
        }
        $result .= "<a target='_blank' href='{$slides_dir}/{$slide}' class='slider__element'><img src='{$slides_dir}/{$slide}'/></a>";
    }
    return $result . "</div>";
}

function translit($string){
    $result = '';

    $chars_array = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    ];

    for($i = 0; $i < mb_strlen($string); $i++){
        $char = mb_substr($string, $i, 1);
        if(!empty($chars_array[$char])){
            $char = $chars_array[$char];
        }
        $result .= $char;
    }
    return $result;
}

$template = file_get_contents('template.html');
$template = str_replace('{SLIDER}', get_slider('./slides'), $template);
echo $template;