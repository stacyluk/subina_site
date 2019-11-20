<?php

class Model
{
    public $db_connect;
    function __construct()
    {
        $host = '127.0.0.1';
        $db = 'shubina_db';
        $user = 'root';
        $pass = 'PuLeLo#1999';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $db_connect = new PDO($dsn, $user, $pass, $opt);

        $sql = 'SELECT news_id, date, news, image_link, link
           FROM news';
        $stmt = $db_connect->prepare($sql);
    }

    public function get_data()
    {

    }
}