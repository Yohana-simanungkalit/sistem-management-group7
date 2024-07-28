<?php
include '../connect.php';

class Pengguna {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create
    public function create($namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses) {
        $sql = "INSERT INTO pengguna (NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses);
        return $stmt->execute();
    }

    // Read
    public function read() {
        $sql = "SELECT * FROM pengguna";
        return $this->conn->query($sql);
    }

    // Update
    public function update($idPengguna, $namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses) {
        $sql = "UPDATE pengguna SET NamaPengguna=?, Password=?, NamaDepan=?, NamaBelakang=?, NoHp=?, Alamat=?, IdAkses=? WHERE IdPengguna=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssii", $namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses, $idPengguna);
        return $stmt->execute();
    }

    // Delete
    public function delete($idPengguna) {
        $sql = "DELETE FROM pengguna WHERE IdPengguna=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPengguna);
        return $stmt->execute();
    }

    // Get a single record
    public function getById($idPengguna) {
        $sql = "SELECT * FROM pengguna WHERE IdPengguna=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPengguna);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
