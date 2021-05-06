<?php

namespace App\Model;

class Database  
{

    private static $_instance;

    private $connection;

    private function __construct()
    {
        $connection = new \PDO('mysql:host=localhost;dbname=blogdev;charset=utf8', 'root', '');
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
    }

    private function __clone()
    {

    }

    public static function getInstance($database)
    {
        if(!isset(self::$_instance)){
             //$database = new Database();
             self::$_instance = $database; 
        }

        return self::$_instance->getInstance();
    }

    public function getConnection()
    {
        
        return $this->connection;
    }
}