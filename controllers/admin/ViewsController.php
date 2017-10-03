<?php
class Views extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function views(){
        $this->session->isLogged('admin');
    }
}