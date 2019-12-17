<?php


class controller_login extends Controller
{
    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    function action_index()
    {
        $message = $this->model->login();
        $this->view->generate('login_view.php', 'template_view.php', $message);
    }

    function action_register()
    {
        $this->model->save();
        $this->view->generate('register_view.php', 'template_view.php');
    }
}