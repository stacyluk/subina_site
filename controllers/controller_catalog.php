<?php


class Controller_Catalog extends Controller
{
    function __construct()
    {
        $this->model = new Model_Catalog();
        $this->view = new View();
    }


    function action_index()
    {
        $data = $this->model->getAllRows();
        $this->view->generate('catalog_view.php', 'template_view.php', $data);
    }

    function action_product($id)
    {
        $data = $this->model->getRowById($id);
        $this->view->generate('product_view.php', 'template_view.php', $data);
    }

    function action_productsList()
    {
        // api method to get json list of products

        $data = $this->model->getAllRows();
        // обработать массив данных, сделать новый массив без числовых индексов
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
