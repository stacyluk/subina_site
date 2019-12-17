<?php


class Model_Login extends Model
{
    function __construct($select = false)
    {
        parent::__construct('login', $select);
    }

    public function fieldsTable()
    {
        return [
            'id' => 'Id',
            'full_name' => 'Full name',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'user_type' => 'User_type',
            'global_privileges' => 'Global Privileges	',
        ];
    }

    public function login()
    {
        $connection = $this->db;

        if (isset($_SESSION['session_username'])) {
            header('Location: http://www.phpsite.local/');
        }

        if (isset($_POST['login'])) {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $query = $connection->query("SELECT * FROM login WHERE username ='".$username."' AND password='".$password."'");
                $rowcount = $query->rowCount();
                if ($rowcount != 0) {

                    foreach ($query->fetchAll() as $row) {
                        $dbusername = $row['username'];
                        $dbpassword = $row['password'];
                    }

                    if ($username == $dbusername && $password == $dbpassword) {
                        $_SESSION['session_username'] = $username;
                        /* Перенаправление браузера */
                        header('Location: http://www.phpsite.local/');
                    }
                } else {
                    $message = "Invalid username or password!";
                }
            } else {
                $message = "All fields are required!";
            }
        }
        return $message;
    }

    public function register() {

    }
}