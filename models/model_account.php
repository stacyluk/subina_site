<?php


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
        $id = $_SESSION['logged_user'];
        return parent::getRowById($id);
    }

    public function changepw()
    {
        $connection = $this->db;

        if (isset($_POST['change_pw']))
        {
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
            if(empty($errors))
            {
                $id = $_SESSION['logged_user'];
                $pass = htmlspecialchars($_POST['password']);
                $user = $this->getRowById();
                $dbpass = $user['password'];

                if (password_verify($pass, $dbpass)) {
                    $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                    // set new password
                    $stmt = $connection->prepare("UPDATE users SET password = ? WHERE id = ? ");
                    $stmt->execute(array($new_pass, $id));
                    $message = "<p>Вы успешно поменяли пароль! <a href='/'>На главную!</a></p>";
                }

            }else {
                $message = array_shift($errors);
            }
        }
        if (!empty($message)) {
            return $message;
        }
    }
}