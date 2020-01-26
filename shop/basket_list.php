<?php 

session_start();

require '../authenticate.php';
authenticate('user');

require '../show_table.php';
require '../database.php';

$basket = array();
$sum = 0;

foreach($_SESSION['basket'] as $product) {
    $id = $product[0];
    $quantity = $product[1];
    $result = Database::get_product($id);
    $row = pg_fetch_row($result);
    $basket[] = array($row[0], $quantity, $row[2], $quantity * $row[2]);
    $sum += $quantity * $row[2];
}

show_array_as_table($basket, array(0, 1, 2, 3));

echo "Razem: ".$sum;

 ?>