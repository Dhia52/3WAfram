<?php

namespace Fram\Database;

include(dirname(__DIR__, 2) . '/config.php');

class ConnectMysql extends \Fram\GenericSingleton
{
    private $pdo;

    protected function __construct()
    {
        $config = getConfig()['db'];
        
        $host = $config['host'];
        $dbname = $config['dbname'];
        $username = $config['username'];
        $pass = $config['pass'];

        $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}