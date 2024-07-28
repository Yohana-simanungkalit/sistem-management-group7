<?php
include '../connect.php';

class Pelanggan {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create
    public function create($namaPelanggan, $alamat, $noHp, $idPengguna) {
        $sql = "INSERT INTO pelanggan (NamaPelanggan, Alamat, NoHp, IdPengguna) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $namaPelanggan, $alamat, $noHp, $idPengguna);
        return $stmt->execute();
    }

    // Read
    public function read() {
        $sql = "SELECT * FROM pelanggan";
        return $this->conn->query($sql);
    }

    // Update
    public function update($idPelanggan, $namaPelanggan, $alamat, $noHp, $idPengguna) {
        $sql = "UPDATE pelanggan SET NamaPelanggan=?, Alamat=?, NoHp=?, IdPengguna=? WHERE IdPelanggan=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssii", $namaPelanggan, $alamat, $noHp, $idPengguna, $idPelanggan);
        return $stmt->execute();
    }

    // Delete
    public function delete($idPelanggan) {
        $sql = "DELETE FROM pelanggan WHERE IdPelanggan=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPelanggan);
        return $stmt->execute();
    }

    // Get a single record
    public function getById($idPelanggan) {
        $sql = "SELECT * FROM pelanggan WHERE IdPelanggan=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPelanggan);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
