<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 18/10/17
 * Time: 14:24
 */

namespace Http;
use App\Controller;

class ContactsController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $this->Session->isLogged('admin');
        $var['title'] = "Portfolio || contacts";
        $var['contacts'] = $this->Model->findAll('contacts', []);
        $this->Views->set($var);
        $this->Views->layout = 'admin';
        $this->Views->render('admin', 'contacts');
    }
    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->Model->delete('contacts', [
            'contactID' => $id
        ]);
        $this->Session->setFlash('contact delete', 'danger');
        $this->Views->redirect(BASE_URL . '/admin/contacts');
        die();
    }
}
