<?php

require 'database.php'; 

try {
    $db = new MyDB('test.db');
}
catch(Exception $e) {
    echo "Can't open database: ",  $e->getMessage(), "\n";
}

include 'order_form.html';



?>