<?php
namespace App;

class Controller

{

    /**
     * load instance
     * Controller constructor.
     */
    public function __construct()
    {
        $this->Session = new Session();
        $this->Model = new Model();
        $this->Views = new View();
        $this->Email = new Email();
        $this->Form = new Form($this);
        $this->Service = new Service();
        $this->Img = new Img();
        $this->Request = new Request();
    }
}
