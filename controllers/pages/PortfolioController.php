<?php
class Portfolio extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function portfolio(){
        $var['title'] = "Portfolio || Réalisations";
        $var['realisations'] = $this->model->findAll('works',[
        ]);
        $var['images'] = $this->model->findAll('images',[]);
        $var['image'] = $this->model->findAll('images i',[
            'join'=>['works w'=>'i.workID=w.workID']
        ]);
        $var['count'] = count($var['images']);
        $this->views->set($var);
    }
}