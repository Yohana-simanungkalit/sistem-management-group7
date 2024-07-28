<?php
include '../connect.php';

class Supplier {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create
    public function create($namaSupplier, $alamat, $noHp, $idPengguna) {
        $sql = "INSERT INTO supplier (NamaSupplier, Alamat, NoHp, IdPengguna) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $namaSupplier, $alamat, $noHp, $idPengguna);
        return $stmt->execute();
    }

    // Read
    public function read() {
        $sql = "SELECT * FROM supplier";
        return $this->conn->query($sql);
    }

    // Update
    public function update($idSupplier, $namaSupplier, $alamat, $noHp, $idPengguna) {
        $sql = "UPDATE supplier SET NamaSupplier=?, Alamat=?, NoHp=?, IdPengguna=? WHERE IdSupplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssii", $namaSupplier, $alamat, $noHp, $idPengguna, $idSupplier);
        return $stmt->execute();
    }

    // Delete
    public function delete($idSupplier) {
        $sql = "DELETE FROM supplier WHERE IdSupplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idSupplier);
        return $stmt->execute();
    }

    // Get a single record
    public function getById($idSupplier) {
        $sql = "SELECT * FROM supplier WHERE IdSupplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idSupplier);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
