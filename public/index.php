<?php



use User\Mvcroute\core\bootstrap;
use User\Mvcroute\core\registry;
use User\Mvcroute\core\validation;
use User\Mvcroute\models\productmodel;

// autoload file to get files
require '../vendor/autoload.php';

// registry "object problems"
registry::set("validate", new validation());
registry::set("product",new productmodel());

// this point wil be starting the project
(new bootstrap());







?>