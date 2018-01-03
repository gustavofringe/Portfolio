<?php
/**
 * Created by PhpStorm.
 * User: gustavo
 * Date: 30/12/17
 * Time: 20:08
 */

namespace App\Router;


use function array_shift;
use function call_user_func;
use function call_user_func_array;
use function dd;
use function is_string;
use function preg_match;
use function preg_replace;
use function preg_replace_callback;
use function print_r;
use function str_replace;
use function trim;
use function var_dump;
use Http;

class Route
{
    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    /**
     * @param $param
     * @param $regex
     * @return $this
     */
    public function with($param, $regex){
        $this->params[$param] = str_replace('(','(?:',$regex);
        return $this;
    }

    /**
     * @param $url
     * @return bool
     */
    public function match($url){
        $url = trim($url,'/');
        $path = preg_replace_callback('#{([\w]+)}#', [$this,'paramMatch'] , $this->path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    /**
     * @param $match
     * @return string
     */
    private function paramMatch($match){
        if(isset($this->params[$match[1]])){
            return '('. $this->params[$match[1]] .')';
        }
        return '([^/]+)';
    }

    /**
     * @return mixed
     */
    public function call(){
        if(is_string($this->callable)){
            $params = explode('@', $this->callable);
            $controller = "Http\\".$params[0]."Controller";
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]],$this->matches);
        }else{
            return call_user_func_array($this->callable, $this->matches);
        }
    }

    /**
     * @param $params
     * @return mixed|string
     */
    public function getUrl($params){
        $path = $this->path;
        foreach ($params as $k=>$v){
            $path = str_replace("{$k}",$v,$path);
        }
        return $path;
    }

}