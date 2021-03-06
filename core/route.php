<?php
namespace core;

class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Home';
        $action_name = 'index';
        $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routes = explode('/', $url_path);

        $rules = [];

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        if (!empty($routes[3])) {
            $parameter = $routes[3];
        }

        // добавляем префиксы
        //$model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)
/*        $model_file = strtolower($model_name).'.php';
        $model_path = "models/".$model_file;
        if (file_exists($model_path)) {
            include "models/".$model_file;
        }*/

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "controllers/".$controller_file;
        if (file_exists($controller_path)) {
            include "controllers/".$controller_file;
        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;


        if (method_exists($controller, $action)) {
            if (!empty($routes[3])) {
                $controller->$action($routes[3]);
            } else {
                // вызываем действие контроллера
                $controller->$action();
            }
        } else {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }

    public function parse_url($url, $path) {
        if (preg_match('#^([\w-]+)#i', $path, $matches)){

        }

    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}