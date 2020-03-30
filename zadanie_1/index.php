<?php

if($_FILES['file']){
    $path_src = $_FILES['file']['tmp_name'];
    $name = translit($_FILES['file']['name'], $translit_array);
    copy($path_src, './slides/' . $name);
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

$translit_array = [
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

function translit($string, $translit_array){
    $result = '';
    for($i = 0; $i < mb_strlen($string); $i++){
        $char = mb_substr($string, $i, 1);
        if(!empty($translit_array[$char])){
            $char = $translit_array[$char];
        }
        $result .= $char;
    }
    return $result;
}

$template = file_get_contents('template.html');
$template = str_replace('{SLIDER}', get_slider('./slides'), $template);
echo $template;