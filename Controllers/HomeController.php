<?php
namespace Http;
use App\Controller;
class HomeController extends Controller
{

    public function index(){
        $var['title'] = "Accueil";
        $this->loadModel('Post');
        $var['realisations'] = $this->Post->findAll('works w', [
            'join'=>['images i'=>'w.workID=i.workID'],
            'group'=>'i.workID'
        ]);
        //$this->Views->set($var);
        $this->Views->render('pages', 'index',$var);
    }
}
