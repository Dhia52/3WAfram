<?php

namespace App\Controller;

use \Fram\AbstractController;

class Home extends AbstractController
{
    public function display()
    {
        return $this->render('welcome');
    }
}