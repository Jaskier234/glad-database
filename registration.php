<!-- <html>
<body>

require "database.php'

Wiatj <?php echo $_POST["login"]; ?> </br>
Twoje hasło to <?php echo $_POST["password"]; ?> </br>

</body>
</html>  -->
<?php 

require 'database.php';

$result = Database::insert_user($_POST["login"], $_POST["password"]);

if ($result == False) {
    echo "Nie udało się założyć konta";
} else {
    echo "Witaj ".$_POST["login"];
}

?>