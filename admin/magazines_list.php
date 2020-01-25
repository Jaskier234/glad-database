<?php 

// list magazines
//  -> query
//  -> list_table

require '../database.php';
require '../show_table.php';

// no need for preparing this query
$result = Database::get_query_result("SELECT depot_id, address FROM depot");

$magazines_list = pg_fetch_all($result, PGSQL_NUM);

show_array_as_table($magazines_list, array(0, 1));

 ?>