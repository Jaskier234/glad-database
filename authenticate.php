<?php 

session_start();

function authenticate($mode, $user_id = -1) {
    if ($mode === 'admin'){
        if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] === false) { // only admin
            echo "Musisz być zalogowany";
            header("HTTP/1.0 403 Not Found");
        }
    } else if ($mode === 'user' && $user_id === -1) { // Every logged user
        if (!isset($_SESSION['user_id'])) {
            echo "Musisz być zalogowany";
            header("HTTP/1.0 403 Not Found");
        }
    } else if ($mode === 'user/admin' && $user_id !== -1) { // only user with certain id or admin
        if ((!isset($_SESSION['user_id']) || srtval($_SESSION['user_id']) !== $user_id) && $_SESSION['is_admin'] === false) {
            echo "Musisz być zalogowany";
            header("HTTP/1.0 403 Not Found");
        }
    } else { // TODO? only user with certain id (not admin)
        echo "Musisz być zalogowany";
        header("HTTP/1.0 403 Not Found");
    }
}

 ?>