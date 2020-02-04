<?php

//namespace controllers;

use core\Controller;
use core\View;
use models\Model_Faq;

class Controller_Faq extends Controller
{
    function __construct()
    {
        $this->model = new Model_Faq();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->getAllRows();
        $this->view->generate('faq_view.php', 'template_view.php', $data);
    }
}