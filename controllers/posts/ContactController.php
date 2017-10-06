<?php
class Contact extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function contact(){
        $var['title'] = "Portfolio || Contact";
        if(!empty($_POST)){
            if(empty($_POST['lastname']) || !preg_match('/^[a-zA-Z-]+$/', $_POST['lastname'])){
                $var['errors']['lastname'] = "Votre prénom est incorrect";
            }
            if(empty($_POST['firstname']) || !preg_match('/^[a-zA-Z-]+$/', $_POST['firstname'])){
                $var['errors']['firstname'] = "Votre nom est incorrect";
            }
            if(empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                $var['errors']['email'] = "Votre email est incorrect";
            }
            if(empty($_POST['phone']) || !preg_match('/^[0-9]+$/', $_POST['phone'])){
                $var['errors']['firstname'] = "Votre telephone est incorrect";
            }
            if(empty($_POST['society']) || !preg_match('/^[a-zA-Z-]+$/', $_POST['society'])){
                $var['errors']['firstname'] = "Votre nom est incorrect";
            }
            if(empty($_POST['firstname']) || !preg_match('/^[a-zA-Z-]+$/', $_POST['firstname'])){
                $var['errors']['firstname'] = "Votre nom est incorrect";
            }
        }
        $this->views->set($var);
    }
}
