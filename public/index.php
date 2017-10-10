<?php
define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('DS', DIRECTORY_SEPARATOR);
include ROOT.DS.'libraries'.DS.'includes.php';
require ROOT.DS.'vendor'.DS.'autoload.php';
//Autoloader::register();
new Route();

