<?php 

require '../authenticate.php';
authenticate('admin');

require '../database.php';
require '../show_table.php';

// no need for preparing this query
$result = Database::get_query_result("SELECT cag_id, address, used FROM collect_and_go");

$cag_list = pg_fetch_all($result, PGSQL_NUM);

show_array_as_table($cag_list, array(0, 1, 2));

 ?>
