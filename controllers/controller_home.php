<?php
use core\Controller;

class Controller_Home extends Controller
{
    function action_index()
    {
        $this->view->generate('home_view.php', 'template_view.php');
    }
}