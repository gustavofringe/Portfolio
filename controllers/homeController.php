<?php
class Home extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function home(){
        $var['title'] = "Accueil";
        $this->views->set($var);
    }
}