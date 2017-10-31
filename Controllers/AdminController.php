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
use function compact;
use function debug;

class AdminController extends Controller
{

    /**
     *
     */
    public function index()
    {
        $var['title'] = "Portfolio || views";
        $this->Session->isLogged('admin');
        $this->loadModel('Admin');
        $var['works'] = $var['works'] = $this->Admin->findAll('works w', [
            'join' => ['images i' => 'i.workID=w.workID'],
            'group' => 'i.workID',
            'limit'=>0,4
        ]);
        $var['images'] = $this->Admin->findAll('images', [
            'distinct' => 'workID,name,folder'

        ]);
        foreach ($var['images'] as $img) {
            $var['tab'][$img->workID]['name'][] = $img->name;
        }
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'index',$var);
    }

    /**
     *
     */
    public function login()
    {
        $title = "Portfolio || Admin";
        $this->loadModel('Admin');
        if (isset($this->Request->post->password)) {
            $password = $this->Service->hashPass($this->Request->post->password);
            $admin = $this->Admin->findAll('admin', [
                'name' => $this->Request->post->username,
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
        }
        $this->Views->render('admin', 'login',compact('title'));
    }

    public function edit($url)
    {
        $var['title'] = "Portfolio || Edit";
        $this->Session->isLogged('admin');
        $this->loadModel('Admin');
        $var['work'] = $this->Admin->findFirst('works w', [
            'fields' => 'w.workID,title,subTitle,techno,folder',
            'join' => ['images i' => 'i.workID=w.workID'],
            'conditions' => ['w.url' => $url]
        ]);
        $var['image'] = $this->Admin->findAll('images', [
            'fields' => 'name,folder,workID',
            'conditions' => ['folder' => $url]
        ]);
        foreach ($var['image'] as $img) {
            $var['tab'][$img->workID]['name'][] = $img->name;
        }

        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'edit',$var);
    }

    public function delete($id)
    {
        $this->Session->isLogged('admin');
        $this->loadModel('Admin');
        $this->Admin->delete('works',$id);
        $this->Session->setFlash('Travail supprimé', 'danger');
        $this->Views->redirect(BASE_URL . '/admin');
        die();
    }


    public function logout()
    {
        $this->Session->logout('admin');
    }

}
