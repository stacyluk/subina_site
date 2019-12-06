<?php

require_once 'autoload.php';
require_once 'database/db.php';
//include ('config/config.php');
$app = new core\Application(
    dirname(__DIR__)
);

$app->router->group(function ($router){
    require __DIR__.'/routes/web.php';
});
/*Route::start(); // запускаем маршрутизатор*/