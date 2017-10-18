<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 17/10/17
 * Time: 18:17
 */

namespace Http\Admin;

use App\Controller;
class ContactsController extends Controller
{
    /**
     *
     */
    public function contacts()
    {
        $var['title'] = "Portfolio || contacts";
        $var['contacts'] = $this->model->findAll('contacts', []);
        $this->views->set($var);
        $this->views->layout = 'admin';
        $this->views->render('admin', 'contacts');
    }
}
