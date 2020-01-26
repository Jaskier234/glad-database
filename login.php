<?php

require 'database.php';

$user_info = pg_fetch_row(Database::get_user($_POST['login']));

if ($user_info === false) {
    // nie ma takiego użytkownika
    echo "Nie udało się zalogować";
}

$hash = $user_info[1];
$password = $_POST['password'];

if (password_verify($password, $hash)) {
    echo "Pomyślnie zalogowano";
    $_SESSION['user_id'] = $user_info[0];
    $_SESSION['is_admin'] = $user_info[2];
} else {
    echo "nie udało się zalogować";
}

?>