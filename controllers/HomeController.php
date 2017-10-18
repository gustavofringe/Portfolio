<?php
namespace Http;
use App\Controller;
class HomeController extends Controller
{

    public function index(){
        $var['title'] = "Accueil";
        $var['msg'] = '';
        $var['realisations'] = $this->model->findAll('works w', [
            'join'=>['images i'=>'w.workID=i.workID'],
            'group'=>'i.workID'
        ]);
        $this->views->set($var);
        $this->views->render('pages', 'index');
    }
}
