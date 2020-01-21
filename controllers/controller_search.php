<?php


class Controller_Search extends Controller
{
    protected $db;

    function __construct()
    {
        $this->model = new Model_Search();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->search();
        $this->view->generate('search_view.php', 'template_view.php', $data);
    }

/*    function action_searchList()
    {
        // api method to get json list of products

        $data = $this->model->search();
        // обработать массив данных, сделать новый массив без числовых индексов
        header('Content-Type: application/json');
        echo json_encode($data);
    }*/
}