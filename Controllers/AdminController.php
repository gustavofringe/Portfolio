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
use function dd;
use function debug;
use function get_object_vars;

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
        $var['works'] = $this->Admin->findAll('works w', [
            /*'innerjoin' => ['images i' => 'i.workID=w.workID'],
            'group' => 'i.workID'*/
            'order'=>'date DESC'
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
            if ($password === $admin[0]->password) {
                $this->Session->write('admin', $admin[0]);
                $this->Session->setFlash("Vous êtes maintenant connecté");
                $this->Views->redirect(BASE_URL . '/scleroseenplaque');
                die();
            } else {
                $this->Session->setFlash("Identifiant ou mot de passe incorrect", 'danger');
            }
        }
        $this->Views->render('admin', 'login',compact('title'));
    }

    public function edit($id)
    {
        $var['title'] = "Portfolio || Edit";
        $this->Session->isLogged('admin');
        $this->loadModel('Admin');
        $var['work'] = $this->Admin->findFirst('works w', [
            'fields' => 'w.workID,title,subtitle,techno,folder,imageID',
            'leftjoin' => ['images i' => 'i.workID=w.workID'],
            'conditions' => ['w.workID' => $id]
        ]);
        $var['image'] = $this->Admin->findAll('images', [
            'fields' => 'name,folder,workID,imageID',
            'conditions' => ['workID' => $id]
        ]);
        foreach ($var['image'] as $img) {
            $var['tab'][$img->workID]['name'][] = $img->name;
            $var['tab'][$img->workID]['id'][] = $img->imageID;
        }
        if($this->Request->post){
            if($this->Admin->validates($this->Request->post)){
                //dd($this->Request->post);
                $test = $this->Admin->save('works',[
                    'workID'=>$id,
                    'title'=>$this->Request->post->title,
                    'subtitle'=>$this->Request->post->subtitle,
                    'techno'=>$this->Request->post->techno
                ]);
                //dd($test);
            }
        }
        if($this->Request->file){
            if($this->Admin->validates($this->Request->file)){
                //dd($this->Request->file);
                $img = $_FILES['image'];
                $size = $img['size'];
                $type = $img['type'];
                $tmp_name = $img['tmp_name'];
                $fileSend = count($tmp_name);
                for ($i = 0; $i < $fileSend; $i++) {
                    $ext = strtolower(substr($img['name'][$i], -3));
                    $auto_ext = ['jpg', 'png', 'svg', 'gif'];
                    if (in_array($ext, $auto_ext)) {
                        $folder = $_POST['folder'];
                        if (!is_dir(ROOT . "/public/img/sites/" . $folder . "/")) {
                            mkdir(ROOT . "/public/img/sites/" . $folder . "/", 0777, true);
                            chmod(ROOT . "/public/img/sites/" . $folder . DS, 0775);
                        }
                        $filename = $img['name'][$i];
                        move_uploaded_file($tmp_name[$i], ROOT . '/public/img/sites/' . $folder . '/' . $img['name'][$i]);
                        $file = ROOT . '/public/img/sites/' . $folder . '/' . $img['name'][$i];
                        $resizedFile = ROOT . '/public/img/sites/' . $folder . '/' . $filename;
                        $this->Img->resize($file, null, 240, 230, true, $resizedFile, false, false, 100);
                        $this->Admin->save('images', [
                            'name' => $img['name'][$i],
                            'type' => $img['type'][$i],
                            'tmp_name' => $img['tmp_name'][$i],
                            'error' => $img['error'][$i],
                            'size' => $img['size'][$i],
                            'folder' => $this->Request->post->folder,
                            'workID' => $id,
                        ]);
                        $this->Session->setFlash('Travail sauvegarder!');
                        $this->Views->redirect(BASE_URL . '/scleroseenplaue');
                    }
                }
            }
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
        $this->Views->redirect(BASE_URL . '/scleroseenplaque');
        die();
    }
public function deleteImage($id){
    $this->Session->isLogged('admin');
    $this->loadModel('Admin');
    $this->Admin->delete('images',$id);
    $this->Session->setFlash('Image supprimé', 'danger');
    $this->Views->redirect(BASE_URL . '/scleroseenplaque');
    die();
}

    public function logout()
    {
        $this->Session->logout('admin');
    }

}
