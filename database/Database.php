<?php

class Database
{
    private static $dsn =
        'pgsql:host=localhost;port=5432;dbname=loja';    
    private static $username = 'postgres';
    private static $password = 'root';
    private static $db;

    private function __construct(){
    }
    
    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "Deu ruim com o banco!";
                exit();
            }
        }
        return self::$db;
    }
}
