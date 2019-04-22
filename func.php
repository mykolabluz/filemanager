<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

function directory($path) {
    if (stream_resolve_include_path($path)) {
        $files = scandir($path);
        natcasesort($files);
        return $files;
    }
}
