<?php

namespace Fram;

class AbstractRepository
{
    protected $pdo;

    public function __construct()
    {
        $connect = \Fram\Database\ConnectMysql::getInstance();
        $this->pdo = $connect->getPdo();
    }
}