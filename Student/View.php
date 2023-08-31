<?php
session_start();

if (!isset($_SESSION['students'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Students</title>
</head>
<body>
  <h1>Student List</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Average</th>
    </tr>
    <?php foreach ($_SESSION['students'] as $student): ?>
      <tr>
        <td><?php echo $student['id']; ?></td>
        <td><?php echo $student['ime']; ?></td>
        <td><?php echo $student['prosek']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
