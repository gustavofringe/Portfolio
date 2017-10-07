<?php
class Views extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function views(){
        $var['title'] = "Portfolio || views";
        $this->session->isLogged('admin');
        $works = $var['works'] = $this->model->findAll('works',[]);
        foreach($works as $work) {
            $cond = ['workID'=>$work->workID];
            $var['images'] = $this->model->findAll('images', [
                'conditions'=>$cond
            ]);
        }
        $this->views->set($var);
    }
    public function logout(){
        $this->session->logout();
        die();
    }
}
