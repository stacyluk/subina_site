<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'../src/mail/send_mail.php';

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
            'status' => 'Status',
            'user_type' => 'User_type',
            'global_privileges' => 'Global Privileges',
        ];
    }

    public function signup()
    {
        $connection = $this->db;

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

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email адрес {$_POST['email']} указан неверно! ";
            }

            if ($_POST['password'] == '') {
                $errors[] = 'Введите пароль';
            }

            if ($_POST['password_2'] == '') {
                $errors[] = 'Введите пароль повторно';
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
                $activation = md5($_POST['email'].time());
                //$connection = $this->db;
                $stmt = $connection->prepare("INSERT INTO $this->table (full_name, username, email, password, activation) VALUES (:full_name, :username, :email, :password, :activation)");
                $stmt->bindParam(':full_name', $_POST['full_name']);
                $stmt->bindParam(':username', $_POST['username']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':activation', $activation);
                $stmt->execute();
                // sending email
                $base_url = BASE_URL;
                $to = $_POST['email'];
                $subject = '"Verify Email"';
                $msg = "Здравствуйте, <br> пожалуйста, пройдите активацию вашего аккаунта на <a href='$base_url'>$base_url</a> по следующей ссылке: <br> <a href=".$base_url.'activation?code='.$activation.">$base_url.activation?code=$activation</a>";
                Send_Mail($to, $subject, $msg);
                $message = "Регистрация прошла успешно! Пройдите активацию через указанный email.";
            } else {
                $message = array_shift($errors);
            }
        }
        if (!empty($message)) {
            return $message;
        }
    }
}