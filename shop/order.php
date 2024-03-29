<?php 

session_start();

require '../authenticate.php';
authenticate('user');

require '../database.php';
// 
// var_dump($_POST['date']);
// var_dump($_POST['hour']);

if (isset($_SESSION['basket']) === false) {
    echo "twój koszyk jest pusty";
    exit();
}

Database::get_query_result("BEGIN TRANSACTION ISOLATION LEVEL Serializable") or die("Failed to start transaction");

if ($_POST["iscag"] === "on") {
    $_POST["address"] = $_POST["cag"]; // assuming cag id is address id of collect and go point 
    // update cag point status
    Database::add_product_to_cag($_POST["cag"]);
}

$summary_price = 0;

foreach($_SESSION['basket'] as $product) {
    $product_id = $product[0];
    $quantity = $product[1];
    
    $result = Database::get_product($product_id);
    $price = pg_fetch_row($result)[2];
    
    $summary_price += $quantity * $price;
}

$due_date = $_POST['date']." ".$_POST['hour'];
$result = Database::insert_order($_SESSION['user_id'], date("Y-m-d H:i:s"), $due_date, $_POST['time_window'], $summary_price, $_POST['address']);

if ($result === false) {
    Database::get_query_result("ROLLBACK");
    echo "złożenie zamówienia nie powiodło się";
    exit();
} else {
    $order_id = (int)pg_fetch_all($result, PGSQL_NUM)[0][0];
}

foreach($_SESSION['basket'] as $product) {
    $product_id = $product[0];
    $quantity = $product[1];
    
    // usuń z bazy danych produkty
    $result = Database::update_product($product_id, $quantity);
    if ($result === false) {
        Database::get_query_result("ROLLBACK");
        echo "złożenie zamówienia nie powiodło się";
        // TODO sprawdzić, czy rollback wykonuje sie poprawnie
        exit();
    }
    
    $result = Database::insert_product_in_order($order_id, $product_id, $quantity);
    if ($result === false) {
        Database::get_query_result("ROLLBACK");
        echo "złożenie zamówienia nie powiodło się";
        // TODO sprawdzić, czy rollback wykonuje sie poprawnie
        exit();
    }
    
    $result = Database::get_product($product_id);
    $price = pg_fetch_row($result)[2];
    
    $summary_price += $quantity * $price;
}

Database::get_query_result("COMMIT");
echo "złożono zamówienie";

unset($_SESSION['basket']);

// TODO lepszy przycisk do statusu zamówienia
echo '<form method=get action=order_status.php>
    <input type=hidden name=order_id value='.$order_id.' />
    <input type=submit value="status zamówienia" />
</form>';

 ?>