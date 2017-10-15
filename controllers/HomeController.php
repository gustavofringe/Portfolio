<?php
namespace Controllers;
use App\Controller;
class Home extends Controller
{

    public function home(){
        $var['title'] = "Accueil";
        $var['realisations'] = $this->model->findAll('works w', [
            'join'=>['images i'=>'w.workID=i.workID'],
            'group'=>'i.workID'
        ]);
        $this->views->set($var);
    }
}
