<?php
    use core\Controller;
    use core\View;
    use model\Model_Account;


class Controller_Account extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Account();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->getRowById();
        $this->view->generate('account_view.php', 'template_view.php', $data);
    }

    function action_details()
    {
        $data = $this->model->details();
        $this->view->generate('details_view.php', 'template_view.php', $data);
    }

    function action_changepw()
    {
        $data = $this->model->changepw();
        $this->view->generate('changepw_view.php', 'template_view.php', $data);
    }
}