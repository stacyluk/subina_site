<?php
$uri  = $_SERVER['REQUEST_URI'];
/*$url_path = parse_url($uri, PHP_URL_PATH);
$url_query = parse_url($uri, PHP_URL_QUERY);*/
$qPos = strpos($uri, '?');

if ($qPos === strlen($uri) - 1) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . substr($uri, 0, $qPos));
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'bootstrap.php';