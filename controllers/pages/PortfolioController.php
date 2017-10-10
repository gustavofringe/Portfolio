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
            'field'=>'name,folder',
            'concat'=>'workID',
            'group'=>'workID'
        ]);
        echo '<pre>';
        print_r($var['images']);
        echo '</pre>';
        $var['count'] = count($var['images']);
        $this->views->set($var);
    }
}
