<?php 

require '../database.php';
require '../show_table.php';

$orders = pg_fetch_all(Database::get_query_result("SELECT order_id, user_name, order_date, due_date, time_window_length, address, price FROM orders"), PGSQL_NUM);

// var_dump($orders);
// var_dump(count($orders));

for ($i = 0; $i < count($orders); $i++) {
    $link = "<a href=/shop/order_status.php?order_id=".$orders[$i][0].">zobacz zamówienie</a>";
    // echo $link."<br>";
    $orders[$i][] = $link;
}

show_array_as_table($orders, array(0, 1, 2, 3, 4, 5, 6, 7));

 ?>