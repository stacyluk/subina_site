<?php

namespace controllers;

use core\Controller;
use core\View;
use models\Model_Search;

class Controller_Search extends Controller
{
    protected $db;

    function __construct()
    {
        $this->model = new Model_Search();
        $this->view = new View();
    }

    function action_index(Request $request)
    {
        $query = $request->getData('query');
        $query = isset($_GET['query']) ? trim($_GET['query']) : false;
        $data = $this->model->search($query);
        $this->view->generate('search_view.php', 'template_view.php', $data);
    }

    function action_searchList()
    {
        // api method to get json list of products
        $query = isset($_GET['query']) ? trim($_GET['query']) : false;
        $data = $this->model->search($query);
        // обработать массив данных, сделать новый массив без числовых индексов
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}