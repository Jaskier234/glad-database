<!DOCTYPE html>
<html>
<head>

</head>
<body>
    
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
