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
            'conditions' => 'featured=1'
        ]);
        $array = [];
        $array2 = [];
        foreach ($var['images'] as $k => $v) {
            array_push($array, $v->workID);
            array_push($array, $v->folder);
            array_push($array2, $v->name);
            $array3 = array_keys($array);
            $array4 = array_values($array3);
            $array4 = $v->name;
            print_r($array4);
        }
        array_push($array,$array2);
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        $var['count'] = count($var['images']);
        $this->views->set($var);
    }
}
