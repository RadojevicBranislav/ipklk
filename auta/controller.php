<?php
require_once 'AutoDAO.php';
require_once 'Auto.php';

$action = $_REQUEST['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dao = new AutoDAO();

    if ($action === 'add') {
        $cena = $_POST['cena'] ?? '';
        $marka = $_POST['marka'] ?? '';
        $auto = new Auto(0, $cena, $marka);
        $dao->insert($auto);
    } elseif ($action === 'update') {
        $id = $_POST['id'] ?? '';
        $cena = $_POST['cena'] ?? '';
        $marka = $_POST['marka'] ?? '';
        $auto = new Auto($id, $cena, $marka);
        $dao->editById($auto);
    }
    
    $autos = $dao->selectAutos();
    include 'view.php';
}
?>
