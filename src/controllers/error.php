<?php 


namespace  User\Mvcroute\controllers;

use User\Mvcroute\core\basecontroller;

class error extends basecontroller{

    public function index(){
        $this->view("error");
    }
}


?>