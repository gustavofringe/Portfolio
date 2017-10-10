<?php

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class)
    {
        include ROOT . DS . 'libraries' . DS . 'Controller.php';
        include ROOT . DS . 'controllers' . DS . ucfirst($class) . 'Controller.php';
    }

}
