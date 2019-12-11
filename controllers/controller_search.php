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


}