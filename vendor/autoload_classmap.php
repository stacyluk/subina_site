<?php

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Database\\DB' => $baseDir.'database\db.php',
    'Core\\Application' => $baseDir.'core\Application.php',
    'Core\\Controller' => $baseDir.'core\Controller.php',
    'Core\\Model' => $baseDir.'core\Model.php',
    'Core\\View' => $baseDir.'core\View.php',
    'Core\\Routing\\Router' => $baseDir.'core\routing\Router.php',
    'Controllers\\Controller_About' => $baseDir.'controllers\controller_about.php',
    'Controllers\\Controller_Catalog' => $baseDir.'controllers\controller_catalog.php',
    'Controllers\\Controller_Home' => $baseDir.'controllers\controller_home.php',
    'Controllers\\Controller_News' => $baseDir.'controllers\controller_news.php',
    'Controllers\\Controller_Contacts' => $baseDir.'controllers\controller_contacts.php'
);