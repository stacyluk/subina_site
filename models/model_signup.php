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
            'activation' => 'Activation',
            'status'=>'Status',
            'user_type' => 'User_type',
            'global_privileges' => 'Global Privileges',
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

            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email адрес {$_POST['email']} указан неверно! ";
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
                $base_url = 'http://www.phpsite.local/signup/';
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $activation = md5($_POST['email'].time());
                $connection = $this->db;
                $stmt = $connection->prepare("INSERT INTO $this->table (full_name, username, email, password, activation) VALUES (:full_name, :username, :email, :password, :activation)");
                $stmt->bindParam(':full_name', $_POST['full_name']);
                $stmt->bindParam(':username', $_POST['username']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':activation', $activation);
                $stmt->execute();
                // sending email
                $to = $_POST['email'];
                $subject = '"Проверка Email-а"';
                $msg = "Hi, <br/> <br/> Активация! Пожалуйста перейдите по ссылке для активации вашего аккаунта. <br/> <br/> <a href=\"'.$base_url.'activation/'.$activation.'\">'.$base_url.'activation/'.$activation.'</a>";
                $message = "Регистрация прошла успешно! Пройдите активацию через указанный email.";
                // save session
                $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
                $stmt->execute(array($_POST['username'], $password));
                $user = $stmt->fetchAll();
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