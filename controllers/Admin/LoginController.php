<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 17/10/17
 * Time: 17:40
 */

namespace Http\Admin;

use App\Controller;
use function debug;

class LoginController extends Controller
{
    /**
     *
     */
    public function login()
    {
        $var['title'] = "Portfolio || Admin";
        $this->Model->loadModel('Admin');
        if($this->Request->data) {
            $this->Model->Admin->validates($this->Request->data);
        }
        /*if (isset($_POST['password'])) {
            $password = $this->service->hashPass($_POST['password']);
            $admin = $this->model->findAll('admin', [
                'name' => $_POST['username'],
                'password' => $password
            ]);
            if ($password == $admin[0]->password) {
                $this->session->write('admin', $admin[0]);
                $this->session->setFlash("Vous êtes maintenant connecté");
                $this->views->redirect(BASE_URL . '/admin/index');
                die();
            } else {
                $this->session->setFlash("Identifiant ou mot de passe incorrect", 'danger');
            }
        }*/
        $this->Views->set($var);
        $this->Views->render('admin', 'login');
    }
}
