<?php

namespace App\Entity;

use \Fram\AbstractEntity;

class ArticleEntity extends AbstractEntity
{
    private $id;
    private $author;
    private $title;
    private $contents;
    private $postDate;
    private $updateDate;

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContents()
    {
        return $this->contents;
    }

    public function getPostDate()
    {
        return $this->post_date;
    }

    public function getUpdateDate()
    {
        return $this->update_date;
    }

    public function setId(int $id)
    {
        if ($id > 0) {
            $this->id = $id;
        } else {
            throw new \Exception('Un problème est survenu...');
        }
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setContents(string $contents)
    {
        $this->contents = $contents;
    }

    public function setPostDate($post_date)
    {
        $this->post_date = $post_date;
    }

    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }
}