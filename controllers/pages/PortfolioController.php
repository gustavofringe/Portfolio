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
        $var['realisations'] = $this->model->findAll('works w', [
            'join'=>['images i'=>'w.workID=i.workID'],
            'group'=>'i.workID'
        ]);
        $var['images'] = $this->model->findAll('images', [
            'distinct'=>'workID,name,folder'

        ]);
        foreach ($var['images'] as $img) {
            $var['tab'][$img->workID]['name'][] = $img->name;
        }
        $this->views->set($var);
    }
}
