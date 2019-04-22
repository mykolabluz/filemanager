<?php


                    echo '<pre>';
                    echo filetype($file);
                    echo '<pre>';
                    echo '<pre>';
//                    print_r($_SERVER);
                    $host = $_SERVER['HTTP_HOST'];
//                    echo '<br>';
//                    print_r($path);
//                    echo '<br>';
                    $array = explode('/', $path);
//                    print_r($array);
                    echo '<br>';
//                    echo count($array);
//                    if (end($array)) {
                        $offset = array_search($host, $array);
                        $new_path = array_slice($array, $offset);
                    
                    $path_file = implode('/', $new_path);
                    $path_file .= '/';
//                    echo '<br>';
//                    print_r($new_path);
//                    echo '<br>';
                    print_r($path_file);
                    echo '<br>';
//                    echo "<a href='images/$file'>$file</a>";
                    echo '<br>';
//                    }
//                    echo '<br>';
//                    echo $offset;
//                    echo '<pre>';
//                    echo "<a href='$file'>$file</a>";
//                    echo '<br>';