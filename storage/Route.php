<?php
namespace App;
use Http;
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
        } elseif(!empty($this->url[0])) {
            $this->loadController();
            $this->methodExist();
            if($this->url[0] === 'admin'){
                $this->views->layout = 'admin';
            }
        }else{
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
        require_once ROOT .DS. 'controllers'.DS.'HomeController.php';
        $this->controller = new Http\Home();
        $this->controller->index();
        $this->views->render('pages', 'index');
    }

    /**
     *load controller with url
     */
    private function loadController()
    {
        $page = ROOT .DS. 'controllers'. DS . ucfirst($this->url[0]) . 'Controller.php';
        if (file_exists($page)) {
            require $page;
            //$this->loadModel($this->url[1]);
            //$this->controller = new $this->url[1];
            //$this->controller->{$this->url[1]}();
        } else {
            $this->errors();
            die();
        }
    }

    /**
     *
     */
    private function methodExist()
    {
        $class = "Http\\".$this->url[0].'Controller';
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
     * @param $name
     */
    private function loadModel($name)
    {
        $path = ROOT . '/model/' . $this->url[0] . '/' . $name . 'Model.php';
        if (file_exists($path)) {
            require ROOT . '/model/' . $this->url[0] . '/' . $name . 'Model.php';
            $modelName = $name . 'Model';
            $this->model = new $modelName();
        }
    }

    /**
     *
     */
    private function errors()
    {
        require ROOT . '/controllers/ErrorsController.php';
        $this->controller = new Http\Errors();
        $this->controller->index();
        die();
    }
}
