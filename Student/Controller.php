<?php
require_once 'StudentDAO.php';

$db = new PDO('mysql:host=localhost;dbname=StudentDB', 'root', '');
$dao = new StudentDAO($db);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ime = $_POST['ime'];
  $prosek = $_POST['prosek'];

  $dao->insertStudent($ime, $prosek);

  $_SESSION['students'] = $dao->getLast10();

  header("Location: view.php");
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
  session_destroy();
  header("Location: index.php");
}
?>
