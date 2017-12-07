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
                    'society' => $this->Request->post->society,
                    'message' => $this->Request->post->msg
                ]);
                $this->Request->post->date = date('Y-m-d');
                $this->Contact->save('contacts', $this->Request->post);
                $this->Session->setFlash('Votre message a été envoyé');
                $this->Views->redirect(BASE_URL.'/');
                die();*/
                $contact = [];
                $contact[] = [
                    'contactID' => 1,
                    'lastname' => $this->Request->post->lastname,
                    'firstname' => $this->Request->post->firstname,
                    'email' => $this->Request->post->email,
                    'phone' => $this->Request->post->phone,
                    'society' => $this->Request->post->society,
                    'msg' => $this->Request->post->msg,
                    'date' => date('Y-m-d')
                ];
                $json_content = json_encode($contact, JSON_PRETTY_PRINT);
                $filename = ROOT . '/db/seeds/contact.json';
                $file = fopen($filename, 'a');
                if ($file == false) {
                    echo 'echec';
                } else {
                    fputs($file, $json_content . ',');
                    fclose($file);
                }
                /*$filename = ROOT.'/db/seeds/contact.json';
                $file = fopen($filename,'a+');
                $contents = fread($file, filesize($filename));
                $cont = json_decode($contents,true);
               //dd($cont);
                //$contacts = [];
                foreach($cont as $k=>$v){
                    $contacts[] = [

                        'contactID'=>$v['contactID'],
                        'lastname'=>$v['lastname'],
                        'firstname'=>$v['firstname'],
                        'email'=>$v['email'],
                        'phone'=>$v['phone'],
                        'society'=>$v['society'],
                        'msg'=>$v['msg'],
                        'date'=>$v['date'],
                    ];
                }
                dd($contacts);*/
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
                /*$this->Project->save('works', [
                    'title' => $this->Request->post->title,
                    'subtitle' => $this->Request->post->subtitle,
                    'techno' => $this->Request->post->techno,
                    'content' => $this->Request->post->content,
                    'url' => $this->Request->post->url,
                    'link' => $this->Request->post->link,
                    'date' => $this->Request->post->date,
                    'online' => $this->Request->post->online
                ]);*/
                $id_image = $this->Project->id;
                $img = $_FILES['image'];
                $size = $img['size'];
                $type = $img['type'];
                $tmp_name = $img['tmp_name'];
                $fileSend = count($tmp_name);
                for ($i=0; $i<$fileSend; ++$i) {
                    $ext = strtolower(substr($img['name'][$i], -3));
                    $auto_ext = ['jpg', 'png', 'svg', 'gif'];
                    if (in_array($ext, $auto_ext)) {
                        $folder = $_POST['folder'];
                        if (!is_dir(ROOT . "/public/img/" . $folder . "/")) {
                            mkdir(ROOT . "/public/img/" . $folder . "/", 0777, true);
                            chmod(ROOT . "/public/img/" . $folder . DS, 0775);
                        }
                        $filename = $img['name'][$i];
                        move_uploaded_file($tmp_name[$i], ROOT . '/public/img/' . $folder . '/' . date('d-m-Y-H-i-s').'-'. $img['name'][$i]);
                        $file = ROOT . '/public/img/' . $folder . '/' . $img['name'][$i];
                        $resizedFile = ROOT . '/public/img/' . $folder . '/' . $filename;
                        $this->Img->resize($file, null, 240, 230, true, $resizedFile, false, false, 100);
                        $test = $this->Project->save('images', [
                            'name' => $img['name'][$i],
                            'type' => $img['type'][$i],
                            'tmp_name' => $img['tmp_name'][$i],
                            'error' => $img['error'][$i],
                            'size' => $img['size'][$i],
                            'folder' => $this->Request->post->folder,
                            'workID' => $id_image,
                        ]);
                        dd($i
                        );
                        die();
                        $this->Session->setFlash('Travail sauvegarder!');
                        //$this->Views->redirect(BASE_URL . '/admin/index');
                        //die();
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
                $this->Img->resize($file, null, 150, 200, false, $file, false, false, 100);
                $this->Post->save('imageCompetences', $this->Request->file->image);
                $this->Request->post->imageCompetenceID = $this->Post->id;
                $this->Post->save('competences', $this->Request->post);
                $this->Views->redirect(BASE_URL . '/admin');
                $this->Session->setFlash('Votre competence est enregistrer');
                die();
            }
        }
        //define layout and send var at view
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'competence', $var);
    }
}
