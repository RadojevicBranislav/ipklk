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

    <h1>List of Autos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Cena</th>
            <th>Marka</th>
        </tr>
        <?php if (isset($autos) && ($autos != NULL)): ?>
            <?php foreach ($autos as $a): ?>
                <tr>
                    <td><?= $a->id ?></td>
                    <td><?= $a->cena ?></td>
                    <td><?= $a->marka ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No data found</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>
