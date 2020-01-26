<!-- <html>
<body>

require "database.php'

Wiatj <?php echo $_POST["login"]; ?> </br>
Twoje hasło to <?php echo $_POST["password"]; ?> </br>

</body>
</html>  -->
<?php 

require 'database.php';

$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$result = Database::insert_user($_POST["login"], $hash);

if ($result == False) {
    echo "Nie udało się założyć konta";
} else {
    echo "Witaj ".$_POST["login"]."<br>";
}

?>