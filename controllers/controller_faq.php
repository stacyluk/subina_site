<?php


class Controller_Faq extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('faq_view.php', 'template_view.php');
    }
}