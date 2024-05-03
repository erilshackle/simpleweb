<?php

//AUTOLOAD CLASSES
spl_autoload_register(function ($filename) {
    $file = __DIR__ . "/classes/$filename.php";
    if (file_exists($file)) {
        require $file;
    }
});


