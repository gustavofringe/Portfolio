<?php
namespace Http;
use App\Controller;
class ErrorsController extends Controller
{
    public function index(){
        $this->views->render('errors', '404');
        die();
    }
}
