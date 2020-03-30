<?php

namespace App\Controller;

use \Fram\AbstractController;
use \App\Entity\ArticleEntity;
use \App\Repository\ArticleRepository;

class Article extends AbstractController
{
    public function create()
    {
        return $this->render('createArticle', ['flash' => $this->flash()->get()]);
    }

    public function post()
    {
        //$_POST['author'] = 'Dhia'; //Delete this later...
        $rep = new ArticleRepository();
        $article = new ArticleEntity($_POST);
        $rep->post($article);
        $flash = $this->flash();
        $flash->set('Nouvel article publié !');
        $this->redirectToRoute('/article/create');
    }
}