<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $var['title'] = "Portfolio || Admin";
        if (isset($_POST['password'])) {
            $password = $this->service->hashPass($_POST['password']);
            $admins = $this->model->findAll('admin', [
                'name' => $_POST['username'],
                'password' => $password
            ]);
            foreach ($admins as $admin) {

                if ($password == $admin->password) {
                    Session::write('admin', $admin);
                    Session::setFlash("Vous êtes maintenant connecté");
                    $this->views->redirect(BASE_URL . '/admin/views');
                } else {
                    Session::setFlash("Identifiant ou mot de passe incorrect", 'danger');
                }
            }
        }
        $this->views->set($var);
    }
}
