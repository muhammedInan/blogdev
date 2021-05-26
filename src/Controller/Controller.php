<?php

namespace App\Controller;

use Components\Session;


class Controller
{

    public function render(string $template ,$parameters = array())
    {
        
        $loader = new \Twig\Loader\FilesystemLoader('./templates/');
        $twig = new \Twig\Environment($loader, array(
            'cache' => false,
        ));
        
        echo $twig->render($template, $parameters);
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

    public function generateToken()
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