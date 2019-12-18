<?php


class Controller_Signup extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Signup();
        $this->view = new View();
    }

    function action_index()
    {
        $message = $this->model->signup();
        $this->view->generate('signup_view.php', 'template_view.php', $message);
    }
}