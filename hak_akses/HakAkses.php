<?php
include '../connect.php';

class HakAkses {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create
    public function create($namaAkses, $keterangan) {
        $sql = "INSERT INTO hakakses (NamaAkses, Keterangan) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $namaAkses, $keterangan);
        return $stmt->execute();
    }

    // Read
    public function read() {
        $sql = "SELECT * FROM hakakses";
        return $this->conn->query($sql);
    }

    // Update
    public function update($idAkses, $namaAkses, $keterangan) {
        $sql = "UPDATE hakakses SET NamaAkses=?, Keterangan=? WHERE IdAkses=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $namaAkses, $keterangan, $idAkses);
        return $stmt->execute();
    }

    // Delete
    public function delete($idAkses) {
        $sql = "DELETE FROM hakakses WHERE IdAkses=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idAkses);
        return $stmt->execute();
    }

    // Get a single record
    public function getById($idAkses) {
        $sql = "SELECT * FROM hakakses WHERE IdAkses=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idAkses);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
