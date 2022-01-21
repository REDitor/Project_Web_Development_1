<?php
spl_autoload_register(function($class) {
    $appDir = dirname(__DIR__) . '/';

    $file = $appDir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});