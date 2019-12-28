<?php 

// TODO: dodać opcję nagłówka
function show_array_as_table($data, $columns) {    
    echo "<table>";
    foreach($data as $row) {
        echo "<tr>";
        for($i = 0; $i < count($columns); $i++) {
            echo "<td>";
            echo $row[$columns[$i]];
            echo "</td>";
        } 
        echo "</tr>";
    }
    echo "</table>";
    
}

// $array = array(
//     array(1,2,3),
//     array(2,2,3),
//     array(3,2,3),
//     array(4,2,3),
// );
// 
// show_array_as_table($array, 2);

?>
