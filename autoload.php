<?php
/*spl_autoload_register( function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});*/
/*/www/models/Model.php*/

$path = "/home/stacy/Documents/vagrant-project";

spl_autoload_register(function ($class_name) use ($path) {
    $path = __DIR__ . DIRECTORY_SEPARATOR ;
    if(strpos($class_name, "Controller") !== false) {
        $path = $path."controllers";
    } else if (strpos($class_name,"Model") !== false) {
        $path = $path."models";
    } else if (false !== strpos($class_name,"Veiw")) {
        $path = $path."views";
    }
    $classFile = "$path". DIRECTORY_SEPARATOR. "$class_name.php";
    printf("Path: $classFile<br>");
    file_exists($classFile) ? require_once ($classFile) : die("Class $class_name not found");
});
/*spl_autoload_register(function ($class) {
    printf("$class");
    // project-specific namespace prefix
    $prefix = '';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . DIRECTORY_SEPARATOR;
    printf("base $base_dir");

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    printf($file);
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});*/
?>
