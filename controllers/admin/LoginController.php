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
                    $this->session->write('admin', $admin);
                    $this->session->setFlash("Vous êtes maintenant connecté");
                    $this->views->redirect(BASE_URL . '/admin/views');
                } else {
                    $this->session->setFlash("Identifiant ou mot de passe incorrect", 'danger');
                }
            }
        }
        $this->views->set($var);
    }
}
