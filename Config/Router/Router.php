<?php
/**
 * Created by PhpStorm.
 * User: gustavo
 * Date: 30/12/17
 * Time: 20:05
 */

namespace App\Router;


use function is_string;
use function print_r;
use function var_dump;
use Http;

class Router
{
    private $url;
    private $routes = [];
    private $namedRoute = [];
    private $controller;

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param $path
     * @param $callable
     * @param null $name
     */
    public function get($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'GET');
    }

    /**
     * @param $path
     * @param $callable
     * @param null $name
     */
    public function post($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
     * @param $path
     * @param $callable
     * @param $name
     * @param $method
     * @return Route
     */
    private function add($path, $callable, $name, $method)
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if (is_string($callable && $name === null)) {
            $name = $callable;
        }
        if ($name) {
            $this->namedRoute[$name] = $route;
        }
        return $route;
    }

    /**
     * @return mixed
     * @throws RouterException
     */
    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            $this->errors();
            //throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        $this->errors();
        //throw new RouterException('No matching route');
    }

    /**
     * @param $name
     * @param array $params
     * @return mixed
     * @throws RouterException
     */
    public function url($name, $params = [])
    {

        if (!isset($this->namedRoute[$name])) {
            $this->errors();
        }

        return $this->namedRoute[$name]->getUrl($params);
    }
    /**
     *load errors controller
     */
    private function errors()
    {
        require ROOT . '/Controllers/ErrorsController.php';
        $this->controller = new Http\ErrorsController();
        $this->controller->index();
        die();
    }
}