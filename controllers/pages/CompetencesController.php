<?php
class Competences extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function competences(){
        $var['title'] = "Portfolio || competences";
        $var['competences'] = $this->model->findAll('competences c',[
            'join'=>['titleCompetence t'=>'c.titleCompetenceID=t.titleCompetenceID'],
            'group'=>'c.titleCompetenceID'
        ]);
        $var['competence'] = $this->model->findAll('competences c',[
            'distinct'=>'titleCompetenceID,images,name',
            'conditions'=>'titleCompetenceID!=1'
        ]);
        $var['system'] = $this->model->findAll('competences',[
            'conditions'=>['titleCompetenceID'=>1]
        ]);
        foreach ($var['competence'] as $img) {
            $var['tab'][$img->titleCompetenceID]['image'][] = $img->images;
            $var['tab'][$img->titleCompetenceID]['name'][] = $img->name;
        }
        debug($var['tab']);
        //debug($var['competences']);
        /*foreach ($var['competences'] as $compet){
            $datenow = new DateTime('now');
            $datetime2 = new DateTime($compet->date);
            $interval = $datetime2->diff($datenow);
            $var['date'] =  $interval->format("%m Mois d'experience");
        }*/
        $this->views->set($var);
    }
}
