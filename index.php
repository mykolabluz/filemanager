<?php

require_once 'func.php';

if ($_GET['path']) {
    $path = $_GET['path'];
} else {
    $path = ROOT;
}
$files = directory($path);
?>
<!DOCTYPE html>
<html lang='ru'>
    <head>
        <title>Файловый менеджер</title>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="list.css">
        <script type="text/javascript" src="jquery.js" ></script>
    </head>
    <body>
        <div id="list">
            <?php
            echo "<div class='directory'>";
            $files2 = array();
            foreach ($files as $file) {

                if ($file != '.') {
                    if (filetype($path . '/' . $file) == 'dir') {
                        echo '<div><a href="#" data-path="' . $path . '/' . $file .
                        '/' . '">' . $file . '</a></div>';
                    } else {
                        //if files
                        $files2[$file] = $file;
                    }
                }
            }
            foreach ($files2 as $file) {
                if ($file) {
                    echo "<a href='#'>$file</a>";
                    echo '<br>';                   
                }
            }
            ?>

        </div>
        <div>
            <a href="images/gallery1.jpg">Открыть</a>
        </div>

        <script type="text/javascript">
<?php
require_once 'ajax.js';
?>
        </script>
    </body>
</html>