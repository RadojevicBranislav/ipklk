<?php
class StudentDAO {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function insertStudent($ime, $prosek) {
    $sql = "INSERT INTO Student (ime, prosek) VALUES (?, ?)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$ime, $prosek]);
  }

  public function getLast10() {
    $sql = "SELECT * FROM Student ORDER BY id DESC LIMIT 10";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
