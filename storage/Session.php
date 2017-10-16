<?php
namespace App;
use const BASE_URL;

class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['csrf'])){
            $_SESSION['csrf'] = md5(time() + rand());
        }
    }
    /**
     * @param $user
     * @return bool
     */
    public function isLogged($user){
        if (!isset($_SESSION[$user])){
            $this->setFlash('Vous n\'avez pas accés a ce contenu', 'danger');
            View::redirect(BASE_URL.'/admin/login');
        }
    }

    /**
     * @param $key
     * @param $value
     */
    public function write($key, $value){
        $_SESSION[$key] = $value;
    }

    /**
     * @param $message
     * @param string $type
     * return flash message at view
     */
    public function setFlash($message, $type = 'success')
    {
        $_SESSION['temp'][$type] = $message;
    }
    /**
     * @return string
     */
    public static function flash()
    {
        if (isset($_SESSION['temp'])) {
            foreach ($_SESSION['temp'] as $type => $message) {
                $html = "<div class='alert alert-{$type}'>";
                $html .= $message;
                $html .= "</div>";
            }
            echo $html;
            //unset($_SESSION['temp']);
        }
    }


    /**
     * deconnect user
     */
    public function logout(){
        session_start();
        session_destroy();
        View::redirect(BASE_URL);
        die();
    }

    public static function checkCsrf(){
        if(
            (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) ||
            (isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf'])
        ){
            return true;
        }
        View::redirect(BASE_URL.'/admin/login');
        die();
    }
}
