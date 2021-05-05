<?php

namespace App\Model;

class Database 
{

    private static $_instance;

    private function __construct()
    {
      
    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if(!isset(self::$_instance)){
            $database = new Database();
             self::$_instance = $database; 
        }

        return self::$_instance->getConnection();
    }

    protected function getConnection()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogdev;charset=utf8', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        return $db;
    }
}