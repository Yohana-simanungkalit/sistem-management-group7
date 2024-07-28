<?php
include 'Pelanggan.php';
include '../connect.php';

$pelanggan = new Pelanggan($conn);

$idPelanggan = $_GET['id'];

if ($pelanggan->delete($idPelanggan)) {
    header("Location: read_pelanggan.php");
    exit();
} else {
    echo "Error: Could not delete record.";
}

$conn->close();
?>
