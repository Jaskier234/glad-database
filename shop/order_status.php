<?php 

// TODO sprawdzanie tożsamości

require '../database.php';
require '../show_table.php';

if(isset($_GET['order_id']) === false) {
    echo "Not found";
    header("HTTP/1.0 404 Not Found");
    exit();
}

$order_id = $_GET['order_id'];

// print order information
$order_information = pg_fetch_all(Database::get_order($order_id))[0];

if ($order_information === false) {
    echo "nie udało się załadować zamówienia";
    exit();
}

$order_date = $order_information['order_date'];
$tw_start = $order_information['due_date'];
$tw_end = date("Y-m-d H:i:s", strtotime($order_information['due_date']) + (3600 * $order_information['time_window_length']));
$price = $order_information['price'];
$address = $order_information['address'];

// TODO tabelka

echo "Zamówienie złożone :".$order_date."<br>";
echo "Planowane dostarczenie pomiędzy:".$tw_start." a ".$tw_end."<br>";
echo "Cena :".$price."<br>";
echo "Adres dostarczenia :".$address."<br>";

echo "Zamówione produkty:<br>";

$elements = pg_fetch_all(Database::get_order_elements($order_id), PGSQL_NUM);

show_array_as_table($elements, array(0, 1, 2));

 ?>