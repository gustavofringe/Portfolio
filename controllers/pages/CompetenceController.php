<?php
class Competence extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function competence(){
        $var['title'] = "Portfolio || competences";
        $var['competences'] = $this->model->findAll('competences c',[
            'join'=>['title_competence t'=>'c.title_competence_id=t.id']
        ]);
        foreach ($var['competences'] as $compet){
            $datenow = new DateTime('now');
            $datetime2 = new DateTime($compet->date);
            $interval = $datetime2->diff($datenow);
            $var['date'] =  $interval->format("%m Mois d'experience");
        }
        $this->views->set($var);
    }
}
