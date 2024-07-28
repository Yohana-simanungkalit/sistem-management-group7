<?php
include 'Barang.php';
include '../connect.php';

$barang = new Barang($conn);

$idBarang = $_GET['id'];

if ($barang->delete($idBarang)) {
    header("Location: read_barang.php");
    exit();
} else {
    echo "Error: Could not delete record.";
}

$conn->close();
?>
