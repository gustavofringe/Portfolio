<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 16/10/17
 * Time: 10:39
 */

namespace Http;


use App\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $var['title'] = "Portfolio || Contact";
        if (!empty($_POST)) {
            if (empty($_POST['lastname']) || !preg_match('/^[a-zA-Z-]+$/', $_POST['lastname'])) {
                $var['errors']['lastname'] = "Votre prénom est incorrect";
            }
            if (empty($_POST['firstname']) || !preg_match('/^[a-zA-Z-]+$/', $_POST['firstname'])) {
                $var['errors']['firstname'] = "Votre nom est incorrect";
            }
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $var['errors']['email'] = "Votre email est incorrect";
            }
            if (empty($_POST['phone']) || !preg_match('/^[0-9]+$/', $_POST['phone'])) {
                $var['errors']['firstname'] = "Votre telephone est incorrect";
            }
            if (empty($_POST['society']) || !preg_match('/^[a-zA-Z-]+$/', $_POST['society'])) {
                $var['errors']['firstname'] = "Votre nom est incorrect";
            }
            $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            if (empty($var['errors'])) {
                $this->Email->send([
                    'lastname'  => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'email'     => $_POST['email'],
                    'phone'     => $_POST['phone'],
                    'society'   => $_POST['society'],
                    'message'   => $message
                ]);
                $date = new DateTime();
                $dat = $date->format('Y-m-d');
                $cond = [
                    'lastname'      =>$_POST['lastname'],
                    'firstname'     =>$_POST['firstname'],
                    'email'         =>$_POST['email'],
                    'phone'         =>$_POST['phone'],
                    'society'       =>$_POST['society'],
                    'message'       =>$message,
                    'date'          =>$dat,
                ];
                $this->Model->save('contacts',[
                    'conditions'=>$cond
                ]);
                $this->Session->setFlash('Votre message a été envoyé');
            }
        }
        $this->Views->set($var);
        $this->Views->render('posts','contact');
    }
    /**
     *
     */
    public function createproject()
    {
        $var['title'] = "Portfolio || new";
        $this->Session->isLogged('admin');
        $this->Model->loadModel('Post');
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
                $this->model->save('works', [
                    'conditions' => $cond
                ]);
                $id_image = $this->Model->id;
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
                        $this->Model->save('images', [
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
        $this->Views->render('admin', 'create',$var);
    }
    public function createcompetence()
    {
        $this->Session->isLogged('admin');
        $var['title'] = "Portfolio || Competences";
        $var['title_competence'] = $this->Model->findAll('titleCompetence', []);
        if (!empty($_POST)) {
            $competence_id = $_POST['competence_id'];
            $title = $_POST['name'];
            $date = $_POST['date'];
            $img = $_FILES['image'];
            $ext = strtolower(substr($img['name'], -3));
            $autor_ext = ['jpg', 'png', 'svg'];
            if (in_array($ext, $autor_ext)) {
                $folder = "competences";
                if (!is_dir(ROOT . "/public/img/" . $folder . "/")) {
                    mkdir(ROOT . "/public/img/" . $folder . "/", 0777, true);

                }
                $filename = $img['name'];
                move_uploaded_file($img['tmp_name'], ROOT . '/public/img/' . $folder . '/' . $img['name']);
                $file = ROOT . '/public/img/' . $folder . '/' . $img['name'];
                $resizedFile = ROOT . '/public/img/' . $folder . '/' . $filename;
                $this->Img->resize($file, null, 150, 200, false, $resizedFile, false, false, 100);
                $cond = ['name' => $title, 'images' => $img['name'], 'titleCompetenceID' => $competence_id, 'sentence' => $_POST['sentence'], 'date' => $date];
                $this->Model->save('competences', [
                    'conditions' => $cond
                ]);
                $this->Views->redirect(BASE_URL . '/admin/views');
                $this->Session->setFlash('Votre competence est enregistrer');
                die();
            } else {
                $var['errors']['extensions'] = "L'image n'est pas au bon format";
            }
        }
        $this->Views->set($var);
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'competence');
    }
public function contact(){
    $var['title'] = "Portfolio || Contact";
    //$this->Views->set($var);
    $this->Views->render('posts', 'contact',$var);
}
}
