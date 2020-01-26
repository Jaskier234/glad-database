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
    Dodaj produkty do bazy danych
    
    <form action="add_products.php" method="post" action="order.php" enctype="multipart/form-data">
        <table>
            <tr>
                <th> Plik z produktami </th>
            </tr>
            <tr>
                <th> <input type="file" name="products"> </th>
            </tr>
            <tr>
                <th><input type="submit" value="dodaj produkty"></th>
            </tr>
        </table>
    </form>
    
</body>
</html>
