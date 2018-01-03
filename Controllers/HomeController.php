<?php
namespace Http;
use App\Controller;
use App\Router\Router;
use function dd;
use Entity\Works;
use function get_object_vars;
use Silex\Provider\UrlGeneratorServiceProvider;
use Symfony\Component\Routing\Annotation\Route;
use Twig_Environment;
use Twig_Loader_Filesystem;

class HomeController extends Controller
{

    /**
     * @Route()
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(){

        $var['title'] = "Accueil";
        $this->loadModel('Post');
        $var['realisations'] = $this->Post->findAll('works w', [
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
