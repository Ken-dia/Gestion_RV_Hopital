<?php
class Manager
{
    private static $instance =null;
    public static function connectDb()
    {
        if(self::$instance === null)
        {
            require 'db_connect.php';
        
            self::$instance = new PDO($DB_DSN, $DB_user, $DB_PASS);
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        }
        
            return self::$instance;
    }
    
}


?>