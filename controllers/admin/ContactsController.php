<?php
class Contacts extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function contacts()
    {
        $this->session->isLogged('admin');
        $var['title'] = "Portfolio || contacts";
        $var['contacts'] = $this->model->findAll('contacts',[]);
        $this->views->set($var);
    }
    public function delete($id){
        $this->model->delete('contacts',[
            'contactID'=>$id
        ]);
        print_r($_SESSION);
        die();
        $this->session->setFlash('contact delete', 'danger');
        $this->views->redirect(BASE_URL.'/admin/contacts');
    }
}