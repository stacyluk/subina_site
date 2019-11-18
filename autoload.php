<?php
/*
spl_autoload_register(function ($class_name) {
    $path = __DIR__ . DIRECTORY_SEPARATOR ;
    if(strpos($class_name, "Controller") !== false) {
        $path = $path."core";
    } else if (strpos($class_name,"Model") !== false) {
        $path = $path."core";
    } else if (false !== strpos($class_name,"View")) {
        $path = $path."core";
    }
    $classFile = "$path". DIRECTORY_SEPARATOR. "$class_name.php";

    file_exists($classFile) ? require_once ($classFile) : die("Class $class_name not found");
});

*/?>
