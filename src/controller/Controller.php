<?php

namespace App\Controller;

use Components\Session;

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

    public function getSession()
    {
        return Session::getSession();
    }

    public function getUser()
    {
        return $this->getSession()->getUser();
    }

    public function genateToken()
    {
    $token = bin2hex(random_bytes(32));
    $this->getSession()->setToken($token);
    return $token;
    }

    public function verifyToken($postToken)
    {
        $sessionToken = $this->getSession()->getToken();
        if (isset($sessionToken) AND isset($postToken) AND !empty($sessionToken) AND !empty($postToken)){
            if ($sessionToken === $postToken) {
                return true;
            }
        }
        return false;
    }
    
}