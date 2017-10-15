<?php
namespace App;
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
     * @param $message
     * @param string $type
     * return flash message at view
     */
    public static function setFlash($message, $type = 'success')
    {
        $_SESSION['flash'][$type] = $message;
    }

    /**
     * @param $user
     * @return bool
     */
    public static function isLogged($user){
        if (!isset($_SESSION[$user])){
            Session::setFlash('Vous n\'avez pas accés a ce contenu');
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
     * @return string
     */
    public function flash(){
        if(isset($_SESSION['flash']['message'])){
            $html = '<div class="alert alert- '.$_SESSION['flash']['type'].'"><p>'.$_SESSION['flash']['message'].'</p></div>';
            $_SESSION['flash'] = array();
            return $html;
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
    function csrf(){
        return 'csrf=' . $_SESSION['csrf'];
    }

    function csrfInput(){
        return '<input type="hidden" value="' . $_SESSION['csrf']. '" name="csrf">';
    }

    function checkCsrf(){
        if(
            (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) ||
            (isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf'])
        ){
            return true;
        }
        header('Location:' . WEBROOT . 'csrf.php');
        die();
    }
}
