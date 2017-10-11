<?php

class Portfolio extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function portfolio()
    {
        $var['title'] = "Portfolio || Réalisations";
        $var['realisations'] = $this->model->findAll('works', []);
        $var['images'] = $this->model->findAll('images', [
            'conditions'=>'featured=1'
        ]);
        foreach ($var['images'] as $k=>$v) {
            echo '<pre>';
            print_r($v);
            echo '</pre>';
        }
        $var['count'] = count($var['images']);
        $this->views->set($var);
    }
}
