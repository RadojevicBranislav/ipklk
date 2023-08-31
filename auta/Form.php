<!DOCTYPE html>
<html>
<head>
    <title>Auto Data Entry</title>
</head>
<body>
    <h1>Enter Auto Data</h1>
    <form action="controller.php" method="post">
        <!-- Hidden field to specify the action -->
        <input type="hidden" name="action" value="add">
        
        Cena: 
        <input type="text" name="cena" required><br>
        
        Marka: 
        <input type="text" name="marka" required><br>
        
        <input type="submit" value="Submit">
    </form>

    <!-- Rest of your existing code -->

</body>
</html>
