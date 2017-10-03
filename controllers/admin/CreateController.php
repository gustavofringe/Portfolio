<?php
class Create extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function create(){
        $var['title'] = "Portfolio || new";
        if(!empty($_POST)){
            if (empty($_POST['title']) || !preg_match('/^[a-zA-Z0-9_\s]+$/', $_POST['title'])) {
                $var['errors']['title'] = "Vous n'avez pas entrer un titre valide";
            }
            if (empty($_POST['url']) || !preg_match('/^[a-z\-0-9]+$/', $_POST['url'])) {
                $var['errors']['url'] = "Vous n'avez pas entrer un url valide";
            }
            if(empty($_POST['content'])){
                $var['errors']['content'] = "Votre contenu est incorrect";
            }
            if(empty($var['errors'])){
                $img = $_FILES['image'];
                $size = $img['size'];
                $type = $img['type'];
                $ext = strtolower(substr($img['name'], -3));
                $auto_ext = ['jpg','png','svg', 'gif'];
                if(in_array($ext, $auto_ext)){
                    $filename = $img['name'];
                    move_uploaded_file($img['tmp_name'], ROOT.'/public/img/'.$img['name']);
                    $file = ROOT.'/public/img/'. $img['name'];
                    $resizedFile =  '../img/' . $filename;
                    Img::resize($file , null, 318 , 180 , false , $resizedFile , false , false ,100 );
                    $condition = ['name'=>$file['name']];
                    $this->model->save('documents',[
                        'conditions'=>$condition
                    ]);
                    $title = $_POST['title'];
                    $url = $_POST['url'];
                    $foreman = $_POST['foreman_id'];
                    $category = $_POST['category_id'];
                    $date = $_POST['date'];
                    $content = $_POST['content'];
                    $cond = ['title'=>$title,'content'=>$content,'url'=>$url,'category_id'=>$category, 'document_id'=>Model::$id, 'foreman_id'=>$foreman,'deadline'=>$date, 'online'=>1];
                    $this->model->save('works',[
                        'conditions'=> $cond
                    ]);
                }else{
                    $var['errors']['image'] = "le fichier n'est pas au bon format";
                }
            }
        }
        $this->views->set($var);
    }
}