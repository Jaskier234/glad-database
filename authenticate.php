<?php 

session_start();

function failure() {
    echo "Musisz być zalogowany";
    header("HTTP/1.0 403 Not Found");
    exit();
}

function authenticate($mode, $user_id = -1) {
    
    // var_dump($_SESSION['user_id']);
    // var_dump($_SESSION['is_admin']);
    // var_dump($user_id);
    
    if ($mode === 'admin'){
        if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] === 'f') { // only admin
            failure();
        }
    } else if ($mode === 'user' && $user_id === -1) { // Every logged user
        if (!isset($_SESSION['user_id'])) {
            failure();
        }
    } else if ($mode === 'user/admin' && $user_id !== -1) { // only user with certain id or admin
        // echo "tutaj";   
        if ((!isset($_SESSION['user_id']) || strval($_SESSION['user_id']) !== $user_id) && (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] === 'f')) {
            failure();
        }
    } else { // TODO? only user with certain id (not admin)
        failure();
    }
}

 ?>