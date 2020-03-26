<?php
    $year = date('Y');
    $template =  file_get_contents('./template.html');
    echo str_replace('{YEAR}', $year, $template);