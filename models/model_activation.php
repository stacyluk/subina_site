<?php


class Model_Activation extends Model
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

    public function activate()
    {
        $connection = $this->db;
        $msg='';
        if(!empty($_GET['code']) && isset($_GET['code']))
        {
            $stmt = $connection->prepare("SELECT id FROM users WHERE activation = ? ");
            $stmt->execute(array($_GET['code']));
            $rowCount = $stmt->rowCount();

            if($rowCount > 0)
            {
                $stmt = $connection->prepare("SELECT id FROM users WHERE activation = ? AND status= ? ");
                $stmt->execute(array($_GET['code'], '0'));
                $rowCount1 = $stmt->rowCount();

                if($rowCount1 == 1)
                {
                    $stmt = $connection->prepare("UPDATE users SET status = ? WHERE activation = ? ");
                    $stmt->execute(array('1', $_GET['code']));
                    $stmt = $connection->prepare("SELECT * FROM users WHERE activation = ?");
                    $stmt->execute(array($_GET['code']));
                    $user = $stmt->fetchAll();
                    $_SESSION['logged_user'] = $user[0]['id'];
                    $message="Ваш аккаунт активирован";
                }
                else
                {
                    $message ="Ваш аккаунт уже активирован";
                }

            }
            else
            {
                $message ="Неверный код активации";
            }

        }

        if (!empty($message)) {
            return $message;
        }
    }
}