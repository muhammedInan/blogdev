<?php

namespace App\Controller;

class DefaultController extends Controller 
{

    public function home()
    {
        return $this->render('index.html.twig');
    }
}