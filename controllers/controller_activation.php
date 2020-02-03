<?php
    use core\Controller;
    use core\View;
    use model\Model_Activation;


class Controller_Activation extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Activation();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->activate();
        $this->view->generate('activation_view.php', 'template_view.php', $data);
    }
}