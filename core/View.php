<?php
namespace core;

class View
{
    /*    private $model;
        private $controller;
        public function __construct($controller,$model) {
            $this->controller = $controller;
            $this->model = $model;
        }

        public function output() {
            ob_start();
            include "home_view.php";
            $home = ob_get_flush();
            echo $home;
        }*/
    function generate($content_view, $template_view, $data = null)
    {
        if (is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }

        include "views/".$template_view;

    }
}