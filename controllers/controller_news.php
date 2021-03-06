<?php

//namespace controllers;

use core\Controller;
use core\View;
use models\Model_News;

class Controller_News extends Controller
{
    function __construct()
    {
        $this->model = new Model_News();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->getAllRows();
        $this->view->generate('news_view.php', 'template_view.php', $data);
    }
}