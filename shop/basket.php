<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    
    <?php require 'basket_list.php'; ?>
    
    <form action=order_form.php>
        <input type=submit value=zamów />
    </form>
    
    <form action=products.php>
        <input type=submit value="kontynuuj zakupy" />
    </form>
    
</body>
</html>
