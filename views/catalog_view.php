<h1>Каталог<h1>
<?php
$database = new Mysql();
$database->connect('mysql:host=localhost;dbname=shubina_db', 'root','PuLeLo#1999');
$model = new Model();
$model->getType();
?>