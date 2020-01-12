<?php 

$filename = $_FILES['products']['tmp_name'];

$file = fopen($filename, 'r') or die("Failed to open file </br>");

// echo "Filetype ".$_FILES['products']['type']."</br>";

// $products = array();

require '../database.php';

Database::get_query_result("BEGIN TRANSACTION ISOLATION LEVEL Serializable") or die("Failed to start transaction");

while ($line = fgetcsv($file, 1000, ',')) {
    $id = $line[0];
    $amount = $line[2];
    
    $result = Database::update_product($id, $amount);
    
    if ($result === false) {
        Database::get_query_result("ROLLBACK");
        die("Nie udało się dodać zamówienia");
    } else if ($result === NULL) {
        if (Database::insert_product($line) === false) {
            Database::get_query_result("ROLLBACK");
            die("Nie udało się dodać zamówienia");
        }
    }
}

Database::get_query_result("COMMIT");
echo "Pomyślnie dodano produkty";

 ?>