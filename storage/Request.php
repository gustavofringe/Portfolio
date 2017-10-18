<?php
namespace App;

use stdClass;

class Request
{
    public $data = false;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        if (!empty($_POST)) {
            $this->data = new stdClass();
            foreach ($_POST as $k => $v) {
                $this->data->$k = $v;
            }
        }
    }
}
