<?php


class Controller_Reset extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Reset();
        $this->view = new View();
    }

    public function action_index()
    {
        $data = $this->model->reset();
        $this->view->generate('reset_view.php', 'template_view.php', $data);
    }
}