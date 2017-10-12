<?php

class Service
{
    private $session;
    public function __construct()
    {
        $this->session = new Session();
    }

    public function hashPass($pass)
    {
        if (isset($pass)) {
            $passHash = sha1($pass);
            return $passHash;
        }
    }

    public function checkPassword($password, $passuser, $user)
    {
        if ($password == $passuser) {
            $this->session->write('user', $user);
            $this->session->setFlash("Vous êtes maintenant connecté");

        } else {
            $this->session->setFlash("Identifiant ou mot de passe incorrect", 'danger');
        }
    }
}
