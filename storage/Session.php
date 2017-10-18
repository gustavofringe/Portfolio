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
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = md5(time() + rand());
        }
    }

    /**
     * @param $user
     * @return bool
     */
    public function isLogged($user)
    {
        if (!isset($_SESSION[$user])) {
            $this->setFlash('Vous n\'avez pas accés a ce contenu', 'danger');
            View::redirect(BASE_URL . '/admin/login');
            die();
        }
    }

    /**
     * @param $key
     * @param $value
     */
    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $message
     * @param string $type
     * return flash message at view
     */
    public function setFlash($message, $type = 'success')
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message'=>$message
        ];
    }

    /**
     * @return string
     */
    static function flash()
    {
        if (isset($_SESSION['flash'])) {
            ?>
            <div class="alert alert-<?= $_SESSION['flash']['type']; ?>">
                <?= $_SESSION['flash']['message']; ?>
            </div>
            <?php
        }
        unset($_SESSION['flash']);
    }


    /**
     * deconnect user
     */
    public function logout($user)
    {
        session_start();
        unset($_SESSION[$user]);
        //session_destroy();
        View::redirect(BASE_URL);
        $this->setFlash('Vous êtes maintenant deconnecter');
    }

    public static function checkCsrf()
    {
        if (
            (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) ||
            (isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf'])
        ) {
            return true;
        }
        View::redirect(BASE_URL . '/admin/login');
        die();
    }
}
