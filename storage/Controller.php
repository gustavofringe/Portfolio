<?php
namespace App;

class Controller

{
    public $session;
    public $form;
    public $service;
    public $views;
    public $model;
    public $email;
    public $img;

    /**
     * load instance
     * Controller constructor.
     */
    public function __construct()
    {
        $this->session = new Session();
        $this->model = new Model();
        $this->views = new View();
        $this->email = new Email();
        $this->form = new Form();
        $this->service = new Service();
        $this->img = new Img();
    }
}
