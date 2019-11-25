<?php


class Controller_Product extends Controller
{
    function __construct()
    {
        $this->model = new Model_Catalog();
        $this->view = new View();
    }


    function action_index()
    {
        $data = $this->model->getAllRows();
        $this->view->generate('product_view.php', 'template_view.php', $data);
    }
}