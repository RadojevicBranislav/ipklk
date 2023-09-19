<?php 
$action=isset($_REQUEST['action'])?$_REQUEST['action']:"";
require_once 'DAOStudent.php';
if(!isset($_SESSION)) session_start(); 

switch ($_SERVER["REQUEST_METHOD"]){
	case "GET":
		switch ($action){
			case "logout":
						if ($_SESSION["korisnik"]!=""){
					session_unset();
					session_destroy();
					include 'index.php';
				}
				break;
		}
		break;
		
	case "POST":
		switch ($action){
			case "Update":
				$id=isset($_POST["id"])?$_POST['id']:"";
				$ime=isset($_POST["ime"])?$_POST['ime']:"";
				$prezime=isset($_POST["prezime"])?$_POST['prezime']:"";
				$indeks=isset($_POST["indeks"])?$_POST['indeks']:"";

				if (!empty($id)&&!empty($ime)&&!empty($prezime)&&!empty($indeks)){
					$dao=new DAOStudent();
					$postoji=$dao->getStudentById($id);
					if ($postoji==true){
							
						$dao->update($id, $ime, $prezime, $indeks);
						$_SESSION["korisnik"]=$id;
						//var_dump($_SESSION);
						//die();
						include 'prikaz.php';
					
					}else{
						$msg="Student sa datim brojem indeksa ne postoji";
						include 'index.php';
					}
				}else{
					$msg="Morate popuniti sva polja";
					include 'index.php';
				}
						break;
				}
		break;
	
}
?>