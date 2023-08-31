<?php
require_once 'db.php';

class AutoDAO
{
    private $db;
    private $INSERTAUTO = "INSERT INTO auto (cena, marka) VALUES (?, ?)";
    private $DELETEAUTO = "DELETE FROM auto WHERE id = ?";
    private $SELECTBYID = "SELECT * FROM auto WHERE id = ?";
    private $UPDATEBYID = "UPDATE auto SET cena = ?, marka = ? WHERE id = ?";
    private $SELECTAUTOS = "SELECT * FROM auto";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function insert($auto)
    {
        $statement = $this->db->prepare($this->INSERTAUTO);
        $statement->bindValue(1, $auto->cena);
        $statement->bindValue(2, $auto->marka);
        $statement->execute();
    }

    public function selectAutos()
    {
        $statement = $this->db->prepare($this->SELECTAUTOS);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function deleteById($id)
    {
        $statement = $this->db->prepare($this->DELETEAUTO);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function editById($auto)
    {
        $statement = $this->db->prepare($this->UPDATEBYID);
        $statement->bindValue(1, $auto->cena);
        $statement->bindValue(2, $auto->marka);
        $statement->bindValue(3, $auto->id);
        $statement->execute();
    }
}
?>
