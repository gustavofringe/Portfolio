<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function home(){
        $var['title'] = "Accueil";
        $var['realisations'] = $this->model->findAll('works w', [
            'join'=>['images i'=>'w.workID=i.workID'],
            'group'=>'i.workID'
        ]);
        $this->views->set($var);
    }
}
