<!-- <html>
<body>

require "database.php'

Wiatj <?php echo $_POST["login"]; ?> </br>
Twoje hasło to <?php echo $_POST["password"]; ?> </br>

</body>
</html>  -->
<?php 

require 'database.php'

Database::get_query_result("INSERT INTO users VALUES ()")

 ?>