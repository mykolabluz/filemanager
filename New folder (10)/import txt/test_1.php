<?php

$file = fopen("files/sample_movies.txt", "r");

while (!feof($file)) {
    
    $content = fgets($file);
    $carray = explode(":", $content);
    list($title, list($a,$b,$c)) = $carray;
    echo '<pre>';
//    var_dump($title);
//    print_r($b);
    var_dump($a, $b, $c);
}
