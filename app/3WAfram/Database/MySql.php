<?php

namespace Fram\Database;

include(dirname(__DIR__, 2) . '/config.php');

class MySql extends \Fram\GenericSingleton implements iDatabase
{
    private $db;

    protected function __construct()
    {
        $config = getConfig()['mysql'];
        
        $host = $config['host'];
        $dbname = $config['dbname'];
        $username = $config['username'];
        $pass = $config['pass'];

        $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
    }

    public function getDatabase()
    {
        return $this->db;
    }
}