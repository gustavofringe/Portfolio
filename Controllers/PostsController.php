<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 16/10/17
 * Time: 10:39
 */

namespace Http;


use App\Controller;
use App\Model;
use function array_push;
use function array_values;
use const BASE_URL;
use function d;
use function dd;
use function fclose;
use function fopen;
use function fwrite;
use function get_object_vars;
use function json_decode;
use function print_r;
use stdClass;

class PostsController extends Controller
{
    public function index()
    {
        $var['title'] = "Portfolio || Contact";
        $this->loadModel('Contact');
        if ($this->Request->post) {
            if ($this->Contact->validates($this->Request->post)) {
                /*$this->Email->send('contact', [
                    'lastname' => $this->Request->post->lastname,
                    'firstname' => $this->Request->post->firstname,
                    'email' => $this->Request->post->email,
                    'phone' => $this->Request->post->phone,
                    'message' => $this->Request->post->msg
                ]);*/
                $this->Request->post->date = date('Y-m-d');
                $this->Contact->save('contacts', get_object_vars($this->Request->post));
                $this->Session->setFlash('Votre message a été envoyé');
                $this->Views->redirect(BASE_URL.'/');
                die();
            }
        }
        $this->Views->render('posts', 'contact', $var);
    }

    /**
     *
     */
    public function createproject()
    {
        $var['title'] = "Portfolio || new";
        $this->Session->isLogged('admin');
        $this->loadModel('Project');
        if ($this->Request->post) {
            if ($this->Project->validates($this->Request->post)) {
                //dd($this->Request->post);
                $this->Request->post->online = 0;
                $this->Project->save('works', [
                    'title' => $this->Request->post->title,
                    'subtitle' => $this->Request->post->subtitle,
                    'techno' => $this->Request->post->techno,
                    'content' => $this->Request->post->content,
                    'url' => $this->Request->post->url,
                    'link' => $this->Request->post->link,
                    'date' => $this->Request->post->date,
                    'online' => $this->Request->post->online
                ]);
                $id_image = $this->Project->id;
                $img = $_FILES['image'];
                $size = $img['size'];
                $type = $img['type'];
                $file_ary = [];
                $tmp_name = $img['tmp_name'];
                $fileSend = count($this->Request->file->image['name']);
                //dd($fileSend);
                for ($i=0; $i<$fileSend; $i++) {
                    $ext = strtolower(substr($img['name'][$i], -3));
                    $auto_ext = ['jpg', 'png', 'svg', 'gif'];
                    if (in_array($ext, $auto_ext)) {
                        $folder = $_POST['folder'];
                        if (!is_dir(ROOT . "/public/img/sites/" . $folder . "/")) {
                            mkdir(ROOT . "/public/img/sites/" . $folder . "/", 0777, true);
                            chmod(ROOT . "/public/img/sites/" . $folder . DS, 0775);
                        }
                        $filename = $img['name'][$i];
                        move_uploaded_file($tmp_name[$i], ROOT . '/public/img/sites/' . $folder . DS. $img['name'][$i]);
                        $file = ROOT . '/public/img/sites/' . $folder . '/' . $img['name'][$i];
                        $resizedFile = ROOT . '/public/img/sites/' . $folder . '/' . $filename;
                        $this->Img->resize($file, null, 240, 350, true, $resizedFile, false, false, 100);
                        $this->Project->save('images', [
                            'name' => $img['name'][$i],
                            'type' => $img['type'][$i],
                            'tmp_name' => $img['tmp_name'][$i],
                            'error' => $img['error'][$i],
                            'size' => $img['size'][$i],
                            'folder' => $this->Request->post->folder,
                            'workID' => $id_image,
                        ]);
                        $this->Session->setFlash('Travail sauvegarder!');
                        $this->Views->redirect(BASE_URL . '/scleroseenplaque');
                    }
                }
            }
        }

        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'create', $var);
    }

    public function createcompetence()
    {
        //only logged
        $this->Session->isLogged('admin');
        //load model for validate and use CRUD
        $this->loadModel('Post');
        //define title page
        $var['title'] = "Portfolio || Competences";
        //load all competences for option group
        $var['title_competence'] = $this->Post->findAll('titleCompetences', []);
        // if !empty $_POST
        if ($this->Request->post) {
            //if form is validate record fields
            if ($this->Post->validates($this->Request->file) && $this->Post->validates($this->Request->post)) {
                if (!is_dir(ROOT . "/public/img/competences/")) {
                    mkdir(ROOT . "/public/img/competences/", 0777, true);
                }
                $name = $this->Request->file->image['name'];
                $tmp = $this->Request->file->image['tmp_name'];
                move_uploaded_file($tmp, ROOT . '/public/img/competences/' . $name);
                $file = ROOT . '/public/img/competences/' . $name;
                $this->Img->resize($file, null, 150, 200, true, $file, false, false, 100);
                $this->Post->save('imageCompetences', $this->Request->file->image);
                $this->Request->post->imageCompetenceID = $this->Post->id;
                $this->Post->save('competences', get_object_vars($this->Request->post));
                $this->Views->redirect(BASE_URL . '/scleroseenplaque');
                $this->Session->setFlash('Votre competence est enregistrer');
                die();
            }
        }
        //define layout and send var at view
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'competence', $var);
    }
}
