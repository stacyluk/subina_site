<?php


class Controller_Account extends Controller
{
    function action_index()
    {
        $this->view->generate('account_view.php', 'template_view.php');
    }
}