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
use function print_r;
use stdClass;

class PostsController extends Controller
{
    public function index()
    {
        $var['title'] = "Portfolio || Contact";
        $this->loadModel('Contact');
        if ($this->Request->post) {
            dd($this->Request->post);
            if ($this->Contact->validates($this->Request->post)) {
                dd($this->Request->post);
                /*$this->Email->send([
                    'lastname'  => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'email'     => $_POST['email'],
                    'phone'     => $_POST['phone'],
                    'society'   => $_POST['society'],
                    //'message'   => $message
                ]);*/
                //$this->Request->data->date = date('Y-m-d');
                $this->Contact->save('contacts', $this->Request->post);
                //$this->Session->setFlash('Votre message a été envoyé');
                //$this->Views->redirect(BASE_URL.'/');
                die();
            }
        }
        //$this->Views->set($var);
        $this->Views->render('posts', 'contact', $var);
    }

    /**
     *
     */
    public function createproject()
    {
        $var['title'] = "Portfolio || new";
        $this->Session->isLogged('admin');
        $this->loadModel('Post');
        if (!empty($_POST)) {
            if (empty($_POST['title']) || !preg_match('/^[a-zA-Z0-9_\s]+$/', $_POST['title'])) {
                $var['errors']['title'] = "Vous n'avez pas entrer un titre valide";
            }
            /*if (empty($_POST['url']) || !preg_match('/^[a-z\-0-9]+$/', $_POST['url'])) {
                $var['errors']['url'] = "Vous n'avez pas entrer un url valide";
            }*/
            /*if (empty($_POST['content'])) {
                $var['errors']['content'] = "Votre contenu est incorrect";
            }*/
            if (empty($var['errors'])) {
                $title = $_POST['title'];
                $subtitle = $_POST['subtitle'];
                $techno = $_POST['techno'];
                $url = $_POST['url'];
                $link = $_POST['link'];
                $date = $_POST['date'];
                $content = $_POST['content'];
                $cond = [
                    'title' => $title,
                    'content' => $content,
                    'url' => $url,
                    'subtitle' => $subtitle,
                    'techno' => $techno,
                    'link' => $link,
                    'date' => $date,
                    'online' => 0
                ];
                $this->Post->save('works', [
                    'conditions' => $cond
                ]);
                $id_image = $this->Post->id;
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
                        if (!is_dir(ROOT . "/public/img/" . $folder . "/")) {
                            mkdir(ROOT . "/public/img/" . $folder . "/", 0777, true);
                            chmod(ROOT . "/public/img/" . $folder . DS, 0775);
                        }
                        $filename = $img['name'][$i];
                        move_uploaded_file($tmp_name[$i], ROOT . '/public/img/' . $folder . '/' . $img['name'][$i]);
                        $file = ROOT . '/public/img/' . $folder . '/' . $img['name'][$i];
                        $resizedFile = ROOT . '/public/img/' . $folder . '/' . $filename;
                        $this->Img->resize($file, null, 240, 230, false, $resizedFile, false, false, 100);
                        $condition = [
                            'name' => $img['name'][$i],
                            'size' => $size[$i],
                            'type' => $type[$i],
                            'workID' => $id_image,
                            'folder' => $folder,
                        ];
                        $this->Admin->save('images', [
                            'conditions' => $condition
                        ]);
                        $this->Session->setFlash('Travail sauvegarder!');
                        $this->Views->redirect(BASE_URL . '/admin/index');
                        die();
                    } else {
                        $var['errors']['image'] = "le fichier n'est pas au bon format";
                    }
                }
            }
        }
        //$this->Views->set($var);
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'create', $var);
    }

    public function createcompetence()
    {
        $this->Session->isLogged('admin');
        $this->loadModel('Post');
        $var['title'] = "Portfolio || Competences";
        $var['title_competence'] = $this->Post->findAll('titleCompetences', []);
        if ($this->Request->post) {
            if ($this->Post->validates($this->Request->file) && $this->Post->validates($this->Request->post)) {
                if (!is_dir(ROOT . "/public/img/competences/")) {
                    mkdir(ROOT . "/public/img/competences/", 0777, true);
                }
                $name = $this->Request->file->image['name'];
                $tmp = $this->Request->file->image['tmp_name'];
                move_uploaded_file($tmp, ROOT . '/public/img/competences/' . $name);
                $file = ROOT . '/public/img/competences/' . $name;
                $this->Img->resize($file, null, 150, 200, false, $file, false, false, 100);
                $this->Post->save('imageCompetences', $this->Request->file->image);
                $this->Request->post->imageCompetenceID = $this->Post->id;
                $this->Post->save('competences', $this->Request->post);
                $this->Views->redirect(BASE_URL . '/admin');
                $this->Session->setFlash('Votre competence est enregistrer');
                die();
            }
            /*$competence_id = $_POST['competence_id'];
            $title = $_POST['name'];
            $date = $_POST['date'];
            $img = $_FILES['image'];
            $ext = strtolower(substr($img['name'], -3));
            $autor_ext = ['jpg', 'png', 'svg'];
            if (in_array($ext, $autor_ext)) {
                $folder = "competences";
                if (!is_dir(ROOT . "/public/img/" . $folder . "/")) {
                    mkdir(ROOT . "/public/img/" . $folder . "/", 0777, true);

                }*/
            //$filename = $img['name'];
            //move_uploaded_file($img['tmp_name'], ROOT . '/public/img/' . $folder . '/' . $img['name']);
            //$file = ROOT . '/public/img/' . $folder . '/' . $img['name'];
            //$resizedFile = ROOT . '/public/img/' . $folder . '/' . $filename;
            //$this->Img->resize('', null, 150, 200, false, '', false, false, 100);
            //$cond = ['name' => $title, 'images' => $img['name'], 'titleCompetenceID' => $competence_id, 'sentence' => $_POST['sentence'], 'date' => $date];
            /*$this->Admin->save('competences', [
                'conditions' => $cond
            ]);*/
            //$this->Views->redirect(BASE_URL . '/admin/views');
            //$this->Session->setFlash('Votre competence est enregistrer');

            //}
        }
        //$this->Views->set($var);
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'competence',$var);
    }
}
