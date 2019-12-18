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
            'user_type' => 'User_type',
            'global_privileges' => 'Global Privileges	',
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
            $query = $connection->query("SELECT * FROM users WHERE username ='" . $username . "' AND password='" . $password . "'");
            $rowcount = $query->rowCount();
            if ($rowcount != 0) {
                $user = $query->fetchAll();
                foreach ($user as $row) {
                    $dbusername = $row['username'];
                    $dbpassword = $row['password'];
                }
                if ($username == $dbusername && $password == $dbpassword) {
                    //логин существует
                    //если пароль совпадает, то нужно авторизовать пользователя и сохранить сессию
                    $_SESSION['logged_user'] = $user;
                    header('Location: http://phpsite.local/');
                    $message = 'Вы авторизованы!';
                } else {
                    $errors[] = 'Неверно введен логин или пароль!';
                }

            } else {
                $errors[] = 'Пользователь не найден!';
            }


            if (empty($errors)) {
                //all right, register user
                // как сохранитьзапись в БД и закодировать пароль???
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