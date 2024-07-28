<?php
include '../connect.php';

class Penjualan {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create
    public function create($jumlahPenjualan, $hargaJual, $idBarang, $idPengguna) {
        $sql = "INSERT INTO penjualan (JumlahPenjualan, HargaJual, IdBarang, IdPengguna) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("idii", $jumlahPenjualan, $hargaJual, $idBarang, $idPengguna);
        return $stmt->execute();
    }

    // Read
    public function read() {
        $sql = "SELECT * FROM penjualan";
        return $this->conn->query($sql);
    }

    // Update
    public function update($idPenjualan, $jumlahPenjualan, $hargaJual, $idBarang, $idPengguna) {
        $sql = "UPDATE penjualan SET JumlahPenjualan=?, HargaJual=?, IdBarang=?, IdPengguna=? WHERE IdPenjualan=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("idiii", $jumlahPenjualan, $hargaJual, $idBarang, $idPengguna, $idPenjualan);
        return $stmt->execute();
    }

    // Delete
    public function delete($idPenjualan) {
        $sql = "DELETE FROM penjualan WHERE IdPenjualan=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPenjualan);
        return $stmt->execute();
    }

    // Get a single record
    public function getById($idPenjualan) {
        $sql = "SELECT * FROM penjualan WHERE IdPenjualan=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPenjualan);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
