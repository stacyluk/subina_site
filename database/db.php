<?php

interface DB {
    public function connect($dsn, $user = '', $pass = '');
    public function query($query);
}

