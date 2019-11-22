<?php

class DB {
    private static $_instance = null;

    const DB_HOST = 'localhost';
    const DB_NAME = 'shubina_db';
    const DB_USER = 'root';
    const DB_PASS = 'PuLeLo#1999';


    private function __construct () {

        $this->_instance = new PDO(
            'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
            self::DB_USER,
            self::DB_PASS,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );

    }

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        return new self;
    }
}
