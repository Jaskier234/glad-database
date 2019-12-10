<?php

class Database {
    private static $database_connection = NULL;      
    
    static function initialize_database() {
        if (is_null(Database::$database_connection)) {
            try {
                Database::$database_connection = pg_connect("host=localhost dbname=testdb user=glad password=a1a2a3a4a5");
                $result = pg_prepare(Database::$database_connection, "insert_user", "INSERT INTO users (login, password) VALUES ($1, $2)");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: insert_user", 1);
                }
            } catch(Exception $e) {
                echo "Can't initialize database connection: ",  $e->getMessage(), "\n";
            }
            
        }
    }
    
    static function get_query_result($query) {
        Database::initialize_database();
        
        return pg_query(Database::$database_connection, $query);
    }
    
    static function insert_user($login, $password) {
        Database::initialize_database();
        
        return pg_execute(Database::$database_connection, "insert_user", array($login, $password));
    }
}

?>