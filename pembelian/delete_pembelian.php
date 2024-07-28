<?php
include 'Pembelian.php';
include '../connect.php';

$pembelian = new Pembelian($conn);

$idPembelian = $_GET['id'];

if ($pembelian->delete($idPembelian)) {
    header("Location: read_pembelian.php");
    exit();
} else {
    echo "Error: Could not delete record.";
}

$conn->close();
?>
