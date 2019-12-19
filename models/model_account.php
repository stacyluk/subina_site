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
            'user_type' => 'User_type',
            'global_privileges' => 'Global Privileges	',
        ];
    }
    public function getRowById($id = null)
    {
        $id = $_SESSION['logged_user'];
        return parent::getRowById($id);
    }
}