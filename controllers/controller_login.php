<?php

//namespace controllers;

use core\Controller;
use core\View;
use models\Model_Login;

class controller_login extends Controller
{
    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    public function fieldsTable()
    {
        return [
            'id' => 'Id',
            'full_name' => 'Full name',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'activation' => 'Activation',
            'status' => 'Status',
            'user_type' => 'User_type',
            'global_privileges' => 'Global Privileges',
        ];
    }

    function action_index()
    {
        $message = $this->model->login();
        $this->view->generate('login_view.php', 'template_view.php', $message);
    }

}