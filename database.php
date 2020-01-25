<?php

class Database {
    private static $database_connection = NULL;      
    
    static function initialize_database() {
        if (is_null(Database::$database_connection)) {
            try {
                Database::$database_connection = pg_connect("host=localhost dbname=testdb user=glad password=a1a2a3a4a5");
                
                // adding new user
                $result = pg_prepare(Database::$database_connection, "insert_user", "INSERT INTO users (login, password) VALUES ($1, $2)");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: insert_user", 1);
                }
                
                // accesing product information
                $result = pg_prepare(Database::$database_connection, "get_product", "SELECT product_name, quantity, price FROM product WHERE product_id = $1");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: get_product", 1);
                }
                
                // insert new products
                $result = pg_prepare(Database::$database_connection, "insert_product", "INSERT INTO product (product_id, product_name, quantity, unit, price, depot) VALUES ($1, $2, $3, $4, $5, $6)");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: insert_product", 1);
                }
                
                // change amount in Database
                $result = pg_prepare(Database::$database_connection, "update_product", "UPDATE product SET quantity = quantity + $1 WHERE product_id = $2");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: update_product", 1);
                }
                
                // insert new order
                $result = pg_prepare(Database::$database_connection, "insert_order", "INSERT INTO orders (user_name, order_date, due_date, time_window_length, price, address) VALUES ($1, $2, $3, $4, $5, $6) RETURNING order_id");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: insert_order", 1);
                }
                
                // insert new product-in-order
                $result = pg_prepare(Database::$database_connection, "insert_product_in_order", "INSERT INTO product_in_order (order_id, product_id, quantity) VALUES ($1, $2, $3)");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: insert_product_in_order", 1);
                }
                
                // get order
                $result = pg_prepare(Database::$database_connection, "get_order", "SELECT order_date, due_date, time_window_length, price, address FROM orders WHERE order_id = $1");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: get_order", 1);
                }
                
                // get order elements
                $result = pg_prepare(Database::$database_connection, "get_order_elements", "SELECT p.product_name, pio.quantity, p.price * pio.quantity
                    FROM product_in_order pio JOIN product p ON pio.product_id = p.product_id
                    WHERE order_id = $1;");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: get_order_elements", 1);
                }
                
                // add order to cag_id
                $result = pg_prepare(Database::$database_connection, "add_to_cag", "UPDATE collect_and_go SET used = used + 1 WHERE cag_id = $1");
                if ($result === False) {
                    throw new Exception("Failed to prepare query: add_to_cag", 1);
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
    
    static function get_product($id) {
        Database::initialize_database();
        
        return pg_execute(Database::$database_connection, "get_product", array($id));
    }
    
    // insert new product 
    static function insert_product($product_info) {
        Database::initialize_database();
        
        return pg_execute(Database::$database_connection, "insert_product", $product_info);
    }
    
    // Updates product amount in database.
    // If amount is negative, amount decreases.
    static function update_product($id, $amount) {
        Database::initialize_database();
        
        // There is no such product in the database
        if (pg_fetch_all(Database::get_product($id)) === false) {
            return NULL;
        }
        
        return pg_execute(Database::$database_connection, "update_product", array($amount, $id));
    }
    
    static function insert_order($user, $order_date, $due_date, $time_window, $price, $address) {
        Database::initialize_database();
        
        return pg_execute(Database::$database_connection, "insert_order", array($user, $order_date, $due_date, $time_window, $price, $address));
    }
    
    static function insert_product_in_order($order_id, $product_id, $quantity) {
        Database::initialize_database();
        
        return pg_execute(Database::$database_connection, "insert_product_in_order", array($order_id, $product_id, $quantity));
    }
    
    static function get_order($order_id) {
        Database::initialize_database();
        
        return pg_execute(Database::$database_connection, "get_order", array($order_id));
    }
    
    static function get_order_elements($order_id) {
        Database::initialize_database();
        
        return pg_execute(Database::$database_connection, "get_order_elements", array($order_id));
    }
    
    static function add_product_to_cag($cag_id) {
        Database::initialize_database();
        
        return pg_execute(Database::$database_connection, "add_to_cag", array($cag_id));
    }
}

?>