<?php
include '../connect.php';

class Barang {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create
    public function create($namaBarang, $keterangan, $satuan, $idPengguna) {
        $sql = "INSERT INTO barang (NamaBarang, Keterangan, Satuan, IdPengguna) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $namaBarang, $keterangan, $satuan, $idPengguna);
        return $stmt->execute();
    }

    // Read
    public function read() {
        $sql = "SELECT * FROM barang";
        return $this->conn->query($sql);
    }

    // Update
    public function update($idBarang, $namaBarang, $keterangan, $satuan, $idPengguna) {
        $sql = "UPDATE barang SET NamaBarang=?, Keterangan=?, Satuan=?, IdPengguna=? WHERE IdBarang=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssii", $namaBarang, $keterangan, $satuan, $idPengguna, $idBarang);
        return $stmt->execute();
    }

    // Delete
    public function delete($idBarang) {
        $sql = "DELETE FROM barang WHERE IdBarang=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idBarang);
        return $stmt->execute();
    }

    // Get a single record
    public function getById($idBarang) {
        $sql = "SELECT * FROM barang WHERE IdBarang=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idBarang);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
