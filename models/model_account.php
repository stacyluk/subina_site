<?php
    namespace model;
    use core\Model;

    class Model_Account extends Model
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

        public function getRowById($id = null)
        {
            $id = $_SESSION['logged_user']['id'];
            return parent::getRowById($id);
        }

        public function changepw()
        {
            $connection = $this->db;

            if (isset($_POST['change_pw'])) {
                // проверить текущий пароль
                if ($_POST['password'] == '') {
                    $errors[] = 'Введите пароль';
                }

                if ($_POST['new_password'] == '') {
                    $errors[] = 'Введите новый пароль';
                }

                if ($_POST['new_password_2'] == '') {
                    $errors[] = 'Введите пароль повторно';
                }

                if ($_POST['new_password_2'] != $_POST['new_password']) {
                    $errors[] = 'Повторный пароль введен не верно!';
                }
                if (empty($errors)) {
                    $id = $_SESSION['logged_user']['id'];
                    $pass = htmlspecialchars($_POST['password']);
                    $user = $this->getRowById();
                    $dbpass = $user['password'];

                    if (password_verify($pass, $dbpass)) {
                        $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                        // set new password
                        $stmt = $connection->prepare("UPDATE users SET password = ? WHERE id = ? ");
                        $stmt->execute(array($new_pass, $id));
                        $message = "<p>Вы успешно поменяли пароль! <a href='/account'>В личный кабинет.</a></p>";
                    } else {
                        $message = 'Неверный текущий пароль!';
                    }

                } else {
                    $message = array_shift($errors);
                }
            }
            if (!empty($message)) {
                return $message;
            }
        }

        public function details()
        {
            $connection = $this->db;

            if (isset($_POST['change_details'])) {
                // verify password
                if (trim($_POST['full_name']) == '') {
                    $errors[] = 'Введите полное имя';
                }

                if (trim($_POST['username']) == '') {
                    $errors[] = 'Введите имя пользователя';
                }

                $users = $this->getAllRows();

                if (!$users) {
                    die("Cannot get users info.\n");
                }

                foreach ($users as $user) {
                    if ($user['username'] === $_POST['username'] && $_SESSION['logged_user']['username'] !== $_POST['username']) {
                        $errors[] = 'Пользователь с таким логином уже есть!';
                    }
                }

                if (empty($errors)) {
                    $id = $_SESSION['logged_user']['id'];
                    $full_name = htmlspecialchars($_POST['full_name']);
                    $username = htmlspecialchars($_POST['username']);

                    $user = $this->getRowById();

                    if (($user['full_name'] !== $full_name) || ($user['username'] !== $username)) {
                        $stmt = $connection->prepare("UPDATE users SET full_name = ? , username = ? WHERE id = ? ");
                        $stmt->execute(array($full_name, $username, $id));
                        $_SESSION['logged_user']['full_name'] = $full_name;
                        $_SESSION['logged_user']['username'] = $username;

                        $message = "<p>Вы успешно поменяли личные данные! <a href='/account'>В личный кабинет.</a></p>";
                    }


                } else {
                    $message = array_shift($errors);
                }
            }
            if (!empty($message)) {
                return $message;
            }
        }
    }