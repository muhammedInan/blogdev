<?php

require_once 'vendor/autoload.php';

use App\Autoloader;
use App\Controller\Controller;

// on définit une constante contenant le dossier racine du projet
//define('ROOT', dirname(__DIR__));

//On importe l'autoloader
//require_once ROOT.'/Autoloader.php';
//Autoloader::register();



if  (isset($_GET['c']) && isset($_GET['t'])) {
    $class = 'Controller\\' . ucfirst($_GET['c']) . 'Controller';
    $target = $_GET['t'];
    $params = (isset($_GET['params'])) ? $_GET['params'] : array();

    if(class_exists($class, true)) {
        $class = new $class();
        if (in_array($target, get_class_methods($class))) {
            call_user_func_array([$class, $target], $params);
            exit();
        }
    }

    $controller = new Controller();

    echo 404;
} else {
        $class = 'Controller\\DefaultController';
        $target = 'home';
        $params = (isset($_GET['params'])) ? $_GET['params'] : array();

        if (class_exists($class, true)) {
            $class = new $class();
            if (in_array($target, get_class_methods($class))){
            call_user_func_array([$class, $target], $params);
            exit();
        }
    }

}
