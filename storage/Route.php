<?php

namespace App;

use Http;
use function ucfirst;

class Route
{
    private $url = false;
    private $controller;
    public $views;

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->views = new View();
        $this->getUrl();
        if (empty($this->url[0])) {
            $this->loadControllerDefault();
        } elseif (!empty($this->url[0]) && !empty($this->url[1])) {
            $this->loadController();
            $this->methodExist();
        } else {
            $this->errors();
            die();
        }
    }


    /**
     *cut the url
     */
    private function getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->url = explode("/", $url);
    }

    /**
     *
     */
    private function loadControllerDefault()
    {
        require_once ROOT . DS . 'controllers' . DS . 'HomeController.php';
        $this->controller = new Http\HomeController();
        $this->controller->index();
    }

    /**
     *load controller with url
     */
    private function loadController()
    {
        $page = ROOT . DS . 'controllers' . DS . ucfirst($this->url[0]) . DS . ucfirst($this->url[1]) . 'Controller.php';
        if (file_exists($page)) {
            require $page;
        } else {
            echo '1111111';
            $this->errors();
            die();
        }
    }

    /**
     *
     */
    private function methodExist()
    {
        $class = "Http\\" . $this->url[0] . "\\" . $this->url[1] . 'Controller';
        $this->controller = new $class;
        $length = count($this->url);
        if ($length > 1) {
            if (!method_exists($this->controller, $this->url[1])) {
                $this->errors();
                die();
            }
        }
        switch ($length) {
            case 5:
                //$controller->method(param1, param2,param3)
                $this->controller->{$this->url[1]}($this->url[2], $this->url[3], $this->url[4]);
                break;
            case 4:
                //$controller->method(param1, param2)
                $this->controller->{$this->url[1]}($this->url[2], $this->url[3]);
                break;
            case 3:
                //$controller->method(param1)
                $this->controller->{$this->url[1]}($this->url[2]);
                break;
            case 2:
                //$controller->method()
                $this->controller->{$this->url[1]}();
                break;
            case 1:
                $this->controller->index();
                break;
            default:
                $this->errors();
                break;
        }
    }



        /**
         *
         */
        private
        function errors()
        {
            require ROOT . '/controllers/ErrorsController.php';
            $this->controller = new Http\ErrorsController();
            $this->controller->index();
            die();
        }
    }
