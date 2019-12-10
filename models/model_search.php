<?php


class Model_Search
{
    protected $db;

    function __construct()
    {
        $this->db = DB::getInstance();
    }


}