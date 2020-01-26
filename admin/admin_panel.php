<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <?php
        require '../authenticate.php';
        authenticate('admin');
    ?>
    
    Panel administracyjny
    
    <a href="delivery_form.php">dostawa</a>
    
    
</body>
</html>
