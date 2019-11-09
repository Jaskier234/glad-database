<?php

class MyDB extends SQLite3 {    
    function get_query_result($query) {
        $data = $this->query($query);
        $result = array();
        $i = 0;
        while($res = $data->fetchArray(SQLITE3_ASSOC)){
            $result[$i] = $res;
            $i++;
        }
        
        return $result;
    }
}

?>