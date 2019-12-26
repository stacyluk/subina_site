<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'../src/generate_pw.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../src/mail/send_mail.php';

class Model_Reset extends Model
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

    public function reset()
    {
        $connection = $this->db;

        if (isset($_POST['reset_pw'])) {
            if (trim($_POST['username']) == '') {
                $errors[] = 'Введите имя пользователя';
            }

            // get users info from 'users' table
            $users = $this->getAllRows();

            if (!$users) {
                die("Cannot get users info.\n");
            }

            foreach ($users as $user) {
                if ($user['username'] === $_POST['username']) {
                    // found a user with this username
                    $pass = Generate_Pw();
                    $password = password_hash($pass, PASSWORD_DEFAULT);
                    // set new password
                    $stmt = $connection->prepare("UPDATE users SET password = ? WHERE username = ? ");
                    $stmt->execute(array($password, $_POST['username']));
                    // send new password for user email
                    $base_url = BASE_URL;
                    $to = $user['email'];
                    $subject = 'Reset password';
                    $msg = "Здравствуйте, <br> ваш новый пароль для аккаунта на сайте <a href='$base_url'>$base_url</a>: $pass </a>";
                    Send_Mail($to, $subject, $msg);
                    $message = 'Проверьте электронную почту! Мы отправили новый пароль на почту, указанную в данных аккаунта.';
                }
            }
        }
        if (!empty($message)) {
            return $message;
        }
    }
}