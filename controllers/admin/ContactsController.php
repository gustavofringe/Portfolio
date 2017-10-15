<?php
namespace Controllers\admin;
use App\Controller;
class Contacts extends Controller{
    /**
     * Contacts constructor.
     */
    public function __construct()
    {
        $this->session->isLogged('admin');
    }

    /**
     *
     */
    public function contacts()
    {
        $var['title'] = "Portfolio || contacts";
        $var['contacts'] = $this->model->findAll('contacts',[]);
        $this->views->set($var);
    }

    /**
     * @param $id
     */
    public function delete($id){
        $this->model->delete('contacts',[
            'contactID'=>$id
        ]);
        $this->session->setFlash('contact delete', 'danger');
        $this->views->redirect(BASE_URL.'/admin/contacts');
    }
}