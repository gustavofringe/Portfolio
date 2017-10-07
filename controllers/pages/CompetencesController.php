<?php
class Competences extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function competences(){
        $var['title'] = "Portfolio || competences";
        $var['competences'] = $this->model->findAll('competences c',[
            'join'=>['titleCompetence t'=>'c.titleCompetenceID=t.titleCompetenceID']
        ]);
        foreach ($var['competences']as $comp){
            print_r($comp->titleCompetenceID);
              $var['id'] = $comp->titleCompetenceID;
        }
        print_r($var['id']);
        /*foreach ($var['competences'] as $compet){
            $datenow = new DateTime('now');
            $datetime2 = new DateTime($compet->date);
            $interval = $datetime2->diff($datenow);
            $var['date'] =  $interval->format("%m Mois d'experience");
        }*/
        $this->views->set($var);
    }
}
