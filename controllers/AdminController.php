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
use function print_r;

class AdminController extends Controller
{

    /**
     *
     */
    public function index()
    {
        $this->session->isLogged('admin');
        $var['title'] = "Portfolio || views";
        $works = $var['works'] = $this->model->findAll('works',[]);
        foreach($works as $work) {
            $cond = ['workID'=>$work->workID];
            $var['images'] = $this->model->findAll('images', [
                'conditions'=>$cond
            ]);
        }
        $this->views->set($var);
        $this->views->layout = 'admin';
        $this->views->render('admin','index');
    }

    /**
     *
     */
    public function login(){
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
                    $this->views->redirect(BASE_URL . '/admin');
                } else {
                    $this->session->setFlash("Identifiant ou mot de passe incorrect", 'danger');
                }
            }
        }
        $this->views->set($var);
        $this->views->render('admin','login');
    }

    /**
     *
     */
    public function create(){
    $var['title'] = "Portfolio || new";
    $this->session->isLogged('admin');
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
            $id_image = App\Model::$id;
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
                    $this->img->resize($file, null, 240, 230, false, $resizedFile, false, false, 100);
                    $condition = [
                        'name' => $img['name'][$i],
                        'size' => $size[$i],
                        'type' => $type[$i],
                        'workID' => $id_image,
                        'folder' => $folder,
                    ];
                    $this->model->save('images', [
                        'conditions' => $condition
                    ]);
                    $this->session->setFlash('Travail sauvegarder!');
                    $this->views->redirect(BASE_URL . '/admin/views');
                } else {
                    $var['errors']['image'] = "le fichier n'est pas au bon format";
                }
            }
        }
    }
    $this->views->set($var);
    $this->views->layout = 'admin';
    $this->views->render('admin','create');
}
    public function competence()
    {
        $this->session->isLogged('admin');
        $var['title'] = "Portfolio || Competences";
        $var['title_competence'] = $this->model->findAll('titleCompetence', []);
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
                $this->img->resize($file, null, 150, 200, false, $resizedFile, false, false, 100);
                $cond = ['name' => $title, 'images' => $img['name'], 'titleCompetenceID' => $competence_id,'sentence'=>$_POST['sentence'], 'date' => $date];
                $this->model->save('competences', [
                    'conditions' => $cond
                ]);
                $this->session->setFlash('Votre competence est enregistrer');
                $this->views->redirect(BASE_URL . '/admin/views');
            } else {
                $var['errors']['extensions'] = "L'image n'est pas au bon format";
            }
        }
        $this->views->set($var);
        $this->views->layout = 'admin';
        $this->views->render('admin','competence');
    }
    /**
     *
     */
    public function views(){
        $this->session->isLogged('admin');
        $var['title'] = "Portfolio || views";
        $works = $var['works'] = $this->model->findAll('works',[]);
        foreach($works as $work) {
            $cond = ['workID'=>$work->workID];
            $var['images'] = $this->model->findAll('images', [
                'conditions'=>$cond
            ]);
        }
        $this->views->set($var);
        $this->views->layout = 'admin';
        $this->views->render('admin','views');
    }

    /**
     *
     */
    public function contacts()
    {
        $var['title'] = "Portfolio || contacts";
        $var['contacts'] = $this->model->findAll('contacts',[]);
        $this->views->set($var);
        $this->views->layout = 'admin';
        $this->views->render('admin','contacts');
    }
    /**
     * @param $id
     */
    public function delete($id){
        $this->model->delete('contacts',[
            'contactID'=>$id
        ]);
        $this->session->setFlash('contact delete', 'danger');
        $this->views->redirect(BASE_URL.'/admin/contacts');
    }
    /**
     *
     */
    public function logout(){
        $this->session->logout();
        die();
    }
}
