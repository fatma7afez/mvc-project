<?php 

namespace  User\Mvcroute\core;


class basecontroller{

    public function __call($name, $arguments =[])
    {
           require_once "../src/views/error.php"; 
       
    }

    public function view($path,$dta =[]){
        extract($dta);

        require_once "../src/views/".$path.".php";
    }

}





?>