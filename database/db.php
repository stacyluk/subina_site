<?php

class DB
{
    private static $_instance = null;

    private function __construct()
    {

        try {
            self::$_instance = new PDO(
                'mysql:host='.DB_HOST.';dbname='.DB_NAME,
                DB_USER,
                DB_PASS,
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $exception) {
            echo 'Подключение не удалось: '.$exception->getMessage();
        }
    }


    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        new self;
        return self::$_instance;
    }
}
