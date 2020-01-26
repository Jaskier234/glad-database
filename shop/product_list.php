<?php 

session_start();

require '../authenticate.php';
authenticate('user');

require '../database.php';
require '../show_table.php';

if ($_POST['quantity'] !== NULL) {
    $_SESSION['basket'][$_POST['id']] = array($_POST['id'], $_POST['quantity']);
}

$query_result = Database::get_query_result("SELECT product_name, price, quantity, unit, product_id FROM product;");

$product_list = pg_fetch_all($query_result, PGSQL_NUM);

if ($product_list === false) {
    exit("error");
}

$input = '<form id=form%d method=post action=products.php>
    <input name=quantity type=number step=%s min=0 max=%f>
    <input type="submit" form=form%d value="dodaj do koszyka">
    <input name=id type=hidden value=%d>
</form>';

$quantity_id = 2;
$unit_id = 3;
$id_id = 4;

for($i = 0; $i < count($product_list); $i++) {
    $unit = $product_list[$i][$unit_id];
    $quantity = $product_list[$i][$quantity_id];
    $id = $product_list[$i][$id_id];
    $product_list[$i][] = sprintf($input, $id, ($unit === "szt.")?("1"):("0.001"), $quantity, $id, $id);
}

show_array_as_table($product_list, array(0, 1, 2, 5));

?>  