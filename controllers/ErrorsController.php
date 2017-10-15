<?php
namespace Controller;
use App\Controller;
class Errors extends Controller
{

    public function index(){
        $this->views->render('errors', '404');
        die();
    }
}