<?php
namespace Http;
use App\Controller;
class ErrorsController extends Controller
{
    public function index(){
        $var['title'] = "Errors";
        $this->views->set($var);
        $this->views->render('errors', '404');
        die();
    }
}
