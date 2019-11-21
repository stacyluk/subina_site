<?php


class Mysql implements DB
{

    public function connect($dsn, $user = '', $pass = '')
    {
        $this->db = new PDO($dsn, $user, $pass);
    }

    public function query($query)
    {
        return $this->db->query($query);
    }
}