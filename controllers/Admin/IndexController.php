<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 17/10/17
 * Time: 17:42
 */

namespace Http\Admin;

use App\Controller;
class IndexController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $this->session->isLogged('admin');

        $var['title'] = "Portfolio || views";
        $var['works'] = $var['works'] = $this->model->findAll('works w', [
            'join' => ['images i' => 'i.workID=w.workID'],
            'group' => 'i.workID'
        ]);
        $var['images'] = $this->model->findAll('images', [
            'distinct' => 'workID,name,folder'

        ]);
        foreach ($var['images'] as $img) {
            $var['tab'][$img->workID]['name'][] = $img->name;
        }

        $this->views->set($var);
        $this->views->layout = 'admin';
        $this->views->render('admin', 'index');
    }
}
