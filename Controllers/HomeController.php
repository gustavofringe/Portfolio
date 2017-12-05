<?php
namespace Http;
use App\Controller;
use Entity\Works;
use function get_object_vars;

class HomeController extends Controller
{

    public function index(){
        $this->debugbar["messages"]->addMessage("hello world!");
        $var['title'] = "Accueil";
        $this->loadModel('Post');
        $var['realisations'] = $this->Post->findAll('works w', [
            'join'=>['images i'=>'w.workID=i.workID'],
            'group'=>'w.workID',
            'limit'=>0,5
        ]);
        $var['realisations'] = new Works($var['realisations']);
        $this->Views->render('pages', 'index',$var);
    }
}
