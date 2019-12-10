<?php

class Database {
    private static $database_connection = NULL;      
    function __construct() {
    
    }
    
    static function get_query_result($query) {
        if (is_null($database_connection)) {
            try {
                Database::$database_connection = pg_connect("host=localhost dbname=testdb user=glad password=a1a2a3a4a5");
                var_dump("connected to database");
            } catch(Exception $e) {
                echo "Can't open database: ",  $e->getMessage(), "\n";
            }
        }
        
        // var_dump($database_connection);
        
        return pg_query(Database::$database_connection, $query);
    }
}

?>