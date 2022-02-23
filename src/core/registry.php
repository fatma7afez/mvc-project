<?php 

namespace  User\Mvcroute\core;

class registry{

    public static $obj=[];
    public static function set($name,$value){
          self::$obj[$name]=$value;
    }
    public static function get($name){
     return  self::$obj[$name];
  }
}



?>