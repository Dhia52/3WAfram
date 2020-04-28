<?php

namespace Fram;

use Database\MySql;
use Database\MongoDB;

class AbstractRepository
{
    protected $db;

    public function __construct($typeDB) 
    {
        switch($typeDB)
        {
            case 'sql':
            case 'mysql':
                $connect = MySql::getInstance();
            break;
            case 'mongo':
            case 'mongodb':
                $connect = MongoDB::getInstance();
            break;
        }

        $this->db = $connect->getDatabase();
    }

    protected function getEntity(iEntity $entity) {

        $result = [];

        if(is_object($entity))
        {
            foreach ($entity as $key => $value) {

                $attributeName = trim(substr($key, strrpos($key, chr(0))));
                $getter = 'get' . ucfirst($attributeName);

                if (method_exists($entity, $getter) && $value !== null) {
                    $result[$attributeName] = call_user_func([$entity, $getter]);
                }
            }
        }
        return $result;
    }
}