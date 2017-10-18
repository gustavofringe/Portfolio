<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 17/10/17
 * Time: 17:43
 */

namespace Http\Admin;

use App\Controller;

class CreateController extends Controller
{
    /**
     *
     */
    public function create()
    {
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
                $id_image = $this->model->id;
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
                        die();
                    } else {
                        $var['errors']['image'] = "le fichier n'est pas au bon format";
                    }
                }
            }
        }
        $this->views->set($var);
        $this->views->layout = 'admin';
        $this->views->render('admin', 'create');
    }
}
