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
        //debug($var['competences']);
        /*foreach ($var['competences'] as $compet){
            $datenow = new DateTime('now');
            $datetime2 = new DateTime($compet->date);
            $interval = $datetime2->diff($datenow);
            $var['date'] =  $interval->format("%m Mois d'experience");
        }*/
        $this->views->set($var);
        $this->views->render('pages','competences');
    }
    public function portfolio()
    {
        $var['title'] = "Portfolio || Réalisations";
        $var['realisations'] = $this->model->findAll('works w', [
            'join'=>['images i'=>'w.workID=i.workID'],
            'group'=>'i.workID'
        ]);
        $var['images'] = $this->model->findAll('images', [
            'distinct'=>'workID,name,folder'

        ]);
        foreach ($var['images'] as $img) {
            $var['tab'][$img->workID]['name'][] = $img->name;
        }
        $this->views->set($var);
        $this->views->render('pages','portfolio');
    }
}
