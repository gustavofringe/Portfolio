<?php
define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('DS', DIRECTORY_SEPARATOR);
require ROOT.DS.'vendor'.DS.'autoload.php';
require ROOT.DS.'Config'.DS.'Route.php';
require ROOT."/vendor/larapack/dd/src/helper.php";
require ROOT."/vendor/maximebf/debugbar/src/DebugBar/DebugBar.php";
new App\Route();

