<?php

namespace  User\Mvcroute\core;


class bootstrap
{


    private $controller;

    private $method;

    private $params;


    public function __construct()
    {

        $this->buildUrl();
        $this->run();
    }


    private function buildUrl()
    {
        $url = $_SERVER['QUERY_STRING'];
        $url = explode("/", $url);

        $this->controller = !empty($url[0]) ? $url[0] : "home";
        $this->method = !empty($url[1]) ? $url[1] : "index";
        unset($url[0], $url[1]);
        $this->params = $url;
      
    }

    private function run()
    {
        $contoller = "User\Mvcroute\controllers\\" . $this->controller;
        if (class_exists($contoller)) {
            $contoller = new $contoller;
            $this->execute($contoller, $this->method, $this->params);
        } else {
            $error = "User\Mvcroute\controllers\\error";
            $error = new $error;
            $this->execute($error, "index", []);
        }
    }


    public function execute($controller, $method, $params)
    {
        call_user_func_array([$controller, $method], $params);
    }
}
