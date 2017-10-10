<?php
namespace App\Controller;
class CompetenceController
{
    public function __construct()
    {
        parent::__construct();
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
                Img::resize($file, null, 150, 200, false, $resizedFile, false, false, 100);
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
    }
}
