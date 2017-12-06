<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 16/10/17
 * Time: 10:40
 */

namespace Http;


use App\Controller;

class PagesController extends Controller
{
    public function competences(){
        $var['title'] = "Portfolio || compétences";
        $this->loadModel('Post');
        $var['competences'] = $this->Post->findAll('competences c',[
            'leftjoin'=>['imageCompetences i'=>'c.imageCompetenceID=i.imageCompetenceID'],
            'innerjoin'=>['titleCompetences t'=>'c.titleCompetenceID=t.titleCompetenceID'],
            'group'=>'c.titleCompetenceID'
        ]);
        $var['competence'] = $this->Post->findAll('competences c',[
            'distinct'=>'titleCompetenceID,name,nameCompetence',
            'leftjoin'=>['imageCompetences i'=>'c.imageCompetenceID=i.imageCompetenceID'],
            'conditions'=>'titleCompetenceID!=1'
        ]);
        $var['system'] = $this->Post->findAll('competences c',[
            'conditions'=>['titleCompetenceID'=>1],
            'leftjoin'=>['imageCompetences i'=>'c.imageCompetenceID=i.imageCompetenceID'],
        ]);
        foreach ($var['competence'] as $img) {
            $var['tab'][$img->titleCompetenceID]['image'][] = $img->name;
            $var['tab'][$img->titleCompetenceID]['name'][] = $img->nameCompetence;
        }
        //debug($var['competences']);
        /*foreach ($var['competences'] as $compet){
            $datenow = new DateTime('now');
            $datetime2 = new DateTime($compet->date);
            $interval = $datetime2->diff($datenow);
            $var['date'] =  $interval->format("%m Mois d'experience");
        }*/
        //$this->Views->set($var);
        $this->Views->render('pages','competences', $var);
    }
    public function portfolio()
    {
        $var['title'] = "Portfolio || Réalisations";
        $this->loadModel('Post');
        $var['realisations'] = $this->Post->findAll('works w', [
            'leftjoin'=>['images i'=>'w.workID=i.workID'],
            'group'=>'i.workID',
            'order'=>'date DESC'
        ]);
        $var['images'] = $this->Post->findAll('images', [
            'distinct'=>'workID,name,folder'

        ]);
        foreach ($var['images'] as $img) {
            $var['tab'][$img->workID]['name'][] = $img->name;
        }
        //$this->Views->set($var);
        $this->Views->render('pages','portfolio',$var);
    }
}
