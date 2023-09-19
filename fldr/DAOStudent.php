<?php
require_once 'db.php';

class DAOStudent {
	private $db;

	// za 2. nacin resenja
	private $INSERTOSOBA = "INSERT INTO osoba (ime, prezime, JMBG, vremeUpisa) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
	private $DELETEOSOBA = "DELETE  FROM osoba WHERE idosoba = ?";
	private $SELECTBYID = "SELECT * FROM osoba WHERE idosoba = ?";	
	private $GETLASTNOSOBA = "SELECT * FROM osoba ORDER BY idosoba DESC LIMIT ?";
	
	private $STUDENTPOSTOJI="SELECT * FROM student WHERE id=?";
	private $UPDATESTUDENT="UPDATE student SET ime=?,prezime=?,br_indexa=? WHERE id=?";
	public function __construct()
	{
		$this->db = DB::createInstance();
	}
	public function getStudent($id){
		$statement = $this->db->prepare($this->STUDENTPOSTOJI);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		$result = $statement->fetch();
		return $result;
	}
	public function getStudentById($id)
	{
		$statement = $this->db->prepare($this->STUDENTPOSTOJI);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		if ($result = $statement->fetch()){
			return true;
		}else{
			return false;
		}
		
	}

	public function update($id,$ime,$prezime,$brIndexa)
	{
		$statement = $this->db->prepare($this->UPDATESTUDENT);
		$statement->bindValue(1, $ime);
		$statement->bindValue(2, $prezime);
		$statement->bindValue(3, $brIndexa);
		$statement->bindValue(4, $id);
		
		$statement->execute();
	}
}
?>
