<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form method="post" action="order.php">
    <table>
        <tr>
            <th> Data dostawy </th>
            <th> <input type="date" name="date"
                   min="2000-01-01" max="2100-12-31"> </th>
        </tr>
        <tr>
            <th> Godzina dostawy </th>
            <th> <input type="time" name="hour"> </th>
        </tr>
        <tr>
            <th> Okno czasowe(w godzinach) </th>
            <th> <input type="number" name="time_window" step=0.5 min="2" max="100" value="2"> </th>
        </tr>
        <tr>
            <th> Adres (tymczasowo id wierzchołka z oms) </th>
            <th> <input type="number" name="address"> </th>
        </tr>
        <tr>
            <th> <input type="checkbox" name="iscag"> Zamów do punktu collect and go </th>
            <th> <?php require 'cag_select.php' ?> </th>
        </tr>
        <tr>
            <th><input type="submit" value=zamów></th>
        </tr>
    </table>
    <!-- <input type=datetime-local step=70 /> <br>
    <input type="text" name="password"> <br> -->
</form>
</body>
</html>


