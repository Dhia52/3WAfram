<?php

namespace Fram\Database;

include(dirname(__DIR__, 2) . '/config.php');

class MongoDB extends \Fram\GenericSingleton implements iDatabase
{
    private $db;

    protected function __construct()
    {
        $config = getConfig()['mongodb'];
        
        $host = $config['host'];
        $dbname = $config['dbname'];

        $client = new MongoDB\Client($host);
        $this->db = $client->selectDatabase($dbname);
    }

    public function getDatabase()
    {
        return $this->db;
    }
}