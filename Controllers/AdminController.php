<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 16/10/17
 * Time: 09:25
 */

namespace Http;


use App\Controller;
use App;
use const BASE_URL;
use function debug;

class AdminController extends Controller
{

    /**
     *
     */
    public function index()
    {
        $this->Session->isLogged('admin');
        $var['title'] = "Portfolio || views";
        $var['works'] = $var['works'] = $this->Model->findAll('works w', [
            'join' => ['images i' => 'i.workID=w.workID'],
            'group' => 'i.workID'
        ]);
        $var['images'] = $this->Model->findAll('images', [
            'distinct' => 'workID,name,folder'

        ]);
        foreach ($var['images'] as $img) {
            $var['tab'][$img->workID]['name'][] = $img->name;
        }

        $this->Views->set($var);
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'index');
    }

    /**
     *
     */
    public function login()
    {
        $var['title'] = "Portfolio || Admin";
        $this->Model->loadModel('Admin');
        if($this->Request->data){
            $this->Model->Admin->validates($this->Request->data);
        }
        /*if (isset($_POST['password'])) {
            $password = $this->Service->hashPass($this->Request->data->password);
            $admin = $this->Model->findAll('admin', [
                'name' => $this->Request->data->username,
                'password' => $password
            ]);
            if ($password == $admin[0]->password) {
                $this->Session->write('admin', $admin[0]);
                $this->Session->setFlash("Vous êtes maintenant connecté");
                $this->Views->redirect(BASE_URL . '/admin');
                die();
            } else {
                $this->Session->setFlash("Identifiant ou mot de passe incorrect", 'danger');
            }
        }*/
        $this->Views->set($var);
        $this->Views->render('admin', 'login');
    }

public function edit($url){
    $var['title'] = "Portfolio || Admin";
    $this->Session->isLogged('admin');
    $var['work'] = $this->Model->findFirst('works w', [
        'fields'=>'w.workID,title,subTitle,techno,folder',
        'join' => ['images i' => 'i.workID=w.workID'],
        'conditions'=> ['w.url'=>$url]
    ]);
    $var['image'] = $this->Model->findAll('images', [
        'fields'=>'name,folder,workID',
        'conditions'=> ['folder'=>$url]
    ]);
    foreach ($var['image'] as $img) {
        $var['tab'][$img->workID]['name'][] = $img->name;
    }

    $this->Views->set($var);
    $this->Views->layout = 'admin';
    $this->Views->render('admin', 'edit');
}

public function delete($id){
    $this->Session->isLogged('admin');
    $this->Model->delete('works',[
        'conditions'=>['workID'=>$id]
    ]);
    $this->Session->setFlash('Travail supprimé','danger');
    $this->Views->redirect(BASE_URL.'/admin');
    die();
}




public function logout(){
        $this->Session->logout('admin');
}

}
