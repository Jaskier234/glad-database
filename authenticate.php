<?php 

session_start();

function authenticate($mode, $user_id = -1) {
    if ($mode === 'admin'){
        if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] === false) {
            echo "Musisz być zalogowany";
            header("HTTP/1.0 403 Not Found");
        }
    } else if ($mode === 'user' && $user_id === -1) {
        if (!isset($_SESSION['user_id'])) {
            echo "Musisz być zalogowany";
            header("HTTP/1.0 403 Not Found");
        }
    } else if ($mode === 'user' && $user_id !== -1) {
        if (!isset($_SESSION['user_id']) || srtval($_SESSION['user_id']) !== $user_id) {
            echo "Musisz być zalogowany";
            header("HTTP/1.0 403 Not Found");
        }
    } else {
        echo "Musisz być zalogowany";
        header("HTTP/1.0 403 Not Found");
    }
}

 ?>