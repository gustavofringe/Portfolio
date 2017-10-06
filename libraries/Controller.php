<?php
class Controller
{
    public $session;
    public $form;
    public $service;
    public $views;
    public $model;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->email = new Email();
        $this->model = new Model();
        $this->views = new View();
        $this->session = new Session();
        $this->form = new Form();
        $this->service = new Service();
    }
}
