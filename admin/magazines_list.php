<?php 

// list magazines
//  -> query
//  -> list_table
    
require '../authenticate.php';
authenticate('admin');

require '../database.php';
require '../show_table.php';

// no need for preparing this query
$result = Database::get_query_result("SELECT d.depot_id, d.address, SUM(COALESCE(p.quantity, 0)) / d.capacity FROM depot d LEFT JOIN product p ON p.depot = d.depot_id GROUP BY d.depot_id ORDER BY d.depot_id");

$magazines_list = pg_fetch_all($result, PGSQL_NUM);

// TODO wypisz procent zamiast liczby

show_array_as_table($magazines_list, array(0, 1, 2), array("id", "adres", "zajęte"));

 ?>