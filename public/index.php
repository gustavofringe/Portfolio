<?php
$debut = microtime(true);
define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
require ROOT.DS.'vendor'.DS.'autoload.php';
$router = new App\Router\Router($_GET['url']);

$router->get('/', "Home@index",'home');
$router->get('/competences', "Pages@competences",'competences');
$router->get('/realisations', "Pages@portfolio",'portfolio');
$router->get('/contact', "Posts@index",'contact');
$router->post('/contact', "Posts@index",'contact');
// route admin
$router->get('/scleroseenplaque',"Admin@index");
$router->get('/login',"Admin@login");
$router->post('/login',"Admin@login");
$router->get('/scleroseenplaque/edit/{id}',"Admin@edit")->with('id','[0-9]+');
$router->post('/scleroseenplaque/edit/{id}',"Admin@edit")->with('id','[0-9]+');
$router->post('/scleroseenplaque/delete/{id}',"Admin@delete")->with('id','[0-9]+');
$router->post('/scleroseenplaque/deleteImage/{id}',"Admin@deleteImage")->with('id','[0-9]+');
$router->get('/scleroseenplaque/contacts',"Contacts@index");
$router->post('/scleroseenplaque/contacts/delete/{id}',"Contacts@delete")->with('id','[0-9]+');
$router->get('/scleroseenplaque/create',"Posts@createproject");
$router->post('/scleroseenplaque/create',"Posts@createproject");
$router->get('/scleroseenplaque/competence',"Posts@createcompetence");
$router->post('/scleroseenplaque/competence',"Posts@createcompetence");
$router->get('/scleroseenplaque/logout',"Admin@logout");
$router->post('/scleroseenplaque/logout',"Admin@logout");
$router->run();
?>
 <div style="position:fixed;bottom:0;background:#1A237E;color:#D50000;line-height:30px;left:0;right:0;padding-left:10px;">
        <?php echo 'Page générée en : ' .round(microtime(true)-$debut,5). ' secondes';?>
    </div>