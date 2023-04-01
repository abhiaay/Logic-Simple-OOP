<?php
function my_autoloader($class_name) {
    $file_name = __DIR__ . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file_name)) {
        require_once $file_name;
    }
}
spl_autoload_register('my_autoloader');
