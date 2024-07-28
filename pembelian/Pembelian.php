<?php
include '../connect.php';

class Pembelian {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create
    public function create($jumlahPembelian, $hargaBeli, $idBarang, $idPengguna) {
        $sql = "INSERT INTO pembelian (JumlahPembelian, HargaBeli, IdBarang, IdPengguna) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("idii", $jumlahPembelian, $hargaBeli, $idBarang, $idPengguna);
        return $stmt->execute();
    }

    // Read
    public function read() {
        $sql = "SELECT * FROM pembelian";
        return $this->conn->query($sql);
    }

    // Update
    public function update($idPembelian, $jumlahPembelian, $hargaBeli, $idBarang, $idPengguna) {
        $sql = "UPDATE pembelian SET JumlahPembelian=?, HargaBeli=?, IdBarang=?, IdPengguna=? WHERE IdPembelian=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("idiii", $jumlahPembelian, $hargaBeli, $idBarang, $idPengguna, $idPembelian);
        return $stmt->execute();
    }

    // Delete
    public function delete($idPembelian) {
        $sql = "DELETE FROM pembelian WHERE IdPembelian=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPembelian);
        return $stmt->execute();
    }

    // Get a single record
    public function getById($idPembelian) {
        $sql = "SELECT * FROM pembelian WHERE IdPembelian=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPembelian);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
