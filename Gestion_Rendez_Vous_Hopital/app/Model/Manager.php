<?php
namespace App\Model;
class Manager
{
    //private static $instance =null;
    private static $instance;
    public static function connectDb()
    {
        require 'db_connect.php';
        if(self::$instance === null)
        {
        
            self::$instance = new \PDO($DB_DSN, $DB_user, $DB_PASS);
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        }
            return self::$instance;
    }
    
}


?>