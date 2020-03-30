<?php

namespace App\Controller;

use \Fram\AbstractController;

class Home extends AbstractController
{
    public function home()
    {
        return $this->render('welcome');
    }

    public function contact()
    {
        return $this->render('contact');
    }
}