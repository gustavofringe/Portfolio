<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 18/10/17
 * Time: 14:24
 */

namespace Http;
use App\Controller;
use function dd;
use function print_r;

class ContactsController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $this->Session->isLogged('admin');
        $this->loadModel('Admin');
        $var['title'] = "Portfolio || contacts";
        $var['contacts'] = $this->Admin->findAll('contacts', []);
        //$this->Views->set($var);
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'contacts',$var);
    }
    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->loadModel('Admin');
        $test = $this->Admin->delete('contacts', $id);
        $this->Session->setFlash('contact delete', 'danger');
        $this->Views->redirect(BASE_URL . '/contacts');
        die();
    }
}
