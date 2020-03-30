<?php

namespace App\Repository;

use \PDO;
use \Fram\AbstractRepository;
use \App\Entity\ArticleEntity;

class ArticleRepository extends AbstractRepository
{
    public function post(ArticleEntity $newArticle)
    {
        $request = $this->pdo->prepare("INSERT INTO articles (author, title, contents, post_date)
            VALUES (:author, :title, :contents, NOW())");
        $request->bindValue(":author", $newArticle->getAuthor(), PDO::PARAM_STR);
        $request->bindValue(":title", $newArticle->getTitle(), PDO::PARAM_STR);
        $request->bindValue(":contents", $newArticle->getContents(), PDO::PARAM_STR);
        $request->execute();
    }
/*
    public function getAll()
    {
        $query = $this->pdo->query('SELECT * FROM articles');
        return $query->fetch(PDO::FETCH_ASSOC);
    }*/
}