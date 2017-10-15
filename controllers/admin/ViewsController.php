<?php
namespace Controllers\admin;

use App\Controller;
use function print_r;

class Views extends Controller{

    /**
     * Views constructor.
     */
    /*public function __construct()
    {
        print_r($this);
        //parent::__construct();
        $this->session->isLogged('admin');
    }*/

    /**
     *
     */
    public function views(){
        $this->session->isLogged('admin');
        $var['title'] = "Portfolio || views";
        $works = $var['works'] = $this->model->findAll('works',[]);
        foreach($works as $work) {
            $cond = ['workID'=>$work->workID];
            $var['images'] = $this->model->findAll('images', [
                'conditions'=>$cond
            ]);
        }
        $this->views->set($var);
    }

    /**
     *
     */
    public function logout(){
        $this->session->logout();
        die();
    }
}
