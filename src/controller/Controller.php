<?php

namespace App\Controller;

require_once 'vendor/autoload.php';

class Controller
{

    public function render($parameters = array())
    {
        $loader = new \Twig\Loader\FilesystemLoader('./templates/');
        $content = new \Twig\Environment($loader, array(
            'cache' => false,
        ));



    }

    public function generateUrlRedirection(string $controller, string $method, array $getParameters = array())
    {
        $url = 'index.php?c=' . $controller . '&t=' . $method;
        foreach ($getParameters as $key => $value) {
            $url .= '$params[' . $key . ']=' . $value;
        }
        header('Location: ' .$url );
        exit();
    }
}