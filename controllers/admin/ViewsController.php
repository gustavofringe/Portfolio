<?php
class Views extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function views(){
        $var['title'] = "Portfolio || views";
        $this->session->isLogged('admin');
        $var['works'] = $this->model->findAll('works',[]);
        $var['images'] = $this->model->findAll('images',[]);
        $this->views->set($var);
    }
    public function logout(){
        $this->session->logout();
        die();
    }
}
