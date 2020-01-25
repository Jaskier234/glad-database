<?php 

require '../database.php';

$cag_list = pg_fetch_all(Database::get_query_result("SELECT cag_id, address FROM collect_and_go"));

echo '<select name="cag">';

foreach ($cag_list as $cag) {
    echo '<option value="'.$cag["cag_id"].'">';
    
    echo $cag['address'];
    
    echo '</option>';
}

echo '</select>';

 ?>