<?php


class Model_Login extends Model
{
    function __construct($select = false)
    {
        parent::__construct('users', $select);
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
            'status'=>'Status',
            'user_type' => 'User_type',
            'global_privileges' => 'Global Privileges',
        ];
    }

    public function login()
    {
        $connection = $this->db;

        if (isset($_SESSION['logged_user'])) {
            header('Location: http://www.phpsite.local/');
        }

        if (isset($_POST['do_login'])) {
            // найти пользователя в БД с таким логином и паролем
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $query = $connection->query("SELECT * FROM users WHERE username ='".$username."'");
            $rowcount = $query->rowCount();
            if ($rowcount != 0) {
                $user = $query->fetchAll();
                foreach ($user as $row) {
                    $dbpassword = $row['password'];
                }
                // login exist
                if (password_verify($password, $dbpassword)) {
                    // save session
                    $_SESSION['logged_user'] = $user[0];
                    header('Location: http://phpsite.local/');
                } else {
                    $errors[] = 'Неверный пароль!';
                }


            } else {
                $errors[] = 'Пользователь не найден!';
            }


            if (empty($errors)) {
                //all right, register user
                $message = 'Добро пожаловать!';
            } else {
                $message = array_shift($errors);
            }

        }
        if (!empty($message)) {
            return $message;
        }
    }
}