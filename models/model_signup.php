<?php


class Model_Signup extends Model
{
    public function __construct($select = false)
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

    public function signup()
    {
        //$connection = $this->db;

        $errors = [];
        if (isset($_POST['do_signup'])) {
            // проверка формы на пустоту полей
            $errors = array();
            if (trim($_POST['full_name']) == '') {
                $errors[] = 'Введите полное имя';
            }

            if (trim($_POST['username']) == '') {
                $errors[] = 'Введите имя пользователя';
            }

            if (trim($_POST['email']) == '') {
                $errors[] = 'Введите Email';
            }

            if ($_POST['password'] == '') {
                $errors[] = 'Введите пароль';
            }

            if ($_POST['password_2'] != $_POST['password']) {
                $errors[] = 'Повторный пароль введен не верно!';
            }

            // проверка на существование юзера с таким же юзернеймом
            $users = $this->getAllRows();

            if (!$users) {
                die("Cannot get users info.\n");
            }

            foreach ($users as $user) {
                if ($user['username'] === $_POST['username']) {
                    $errors[] = 'Пользователь с таким логином уже есть!';
                }

                if ($user['email'] === $_POST['email']) {
                    $errors[] = 'Пользователь с таким email уже есть!';
                }
            }

            if (empty($errors)) {
                //all right, register user
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $connection = $this->db;
                $stmt = $connection->prepare("INSERT INTO $this->table (full_name, username, email, password) VALUES (:full_name, :username, :email, :password)");
                $stmt->bindParam(':full_name', $_POST['full_name']);
                $stmt->bindParam(':username', $_POST['username']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                // save session
                $query = $connection->query("SELECT * FROM users WHERE username ='" . $_POST['username'] . "' AND password='" . $password . "'");
                // TODO: prepare
                $user = $query->fetchAll();
                $_SESSION['logged_user'] = $user[0]['id'];
                header('Location: http://phpsite.local/');
                // $message = 'Вы зарегестрированны! ';

            } else {
                $message = array_shift($errors);
            }
        }
        if (!empty($message)) {
            return $message;
        }
    }
}