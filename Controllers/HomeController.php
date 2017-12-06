<?php
namespace Http;
use App\Controller;
use function dd;
use Entity\Works;
use function get_object_vars;

class HomeController extends Controller
{

    public function index(){
        $var['title'] = "Accueil";
        $this->loadModel('Post');
        $test = $var['realisations'] = $this->Post->findAll('works w', [
            'leftjoin'=>['images i'=>'w.workID=i.workID'],
            'group'=>'w.workID',
            'order'=>'date DESC',
            'limit'=>6
        ]);
        foreach ($var['realisations'] as $k => $v) {
            $var['realisations'][$k] = new Works(get_object_vars($v));
        }
        $this->Views->render('pages', 'index',$var);
    }
}
