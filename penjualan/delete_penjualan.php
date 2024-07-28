<?php
include 'Penjualan.php';
include '../connect.php';

$penjualan = new Penjualan($conn);

$idPenjualan = $_GET['id'];

if ($penjualan->delete($idPenjualan)) {
    header("Location: read_penjualan.php");
    exit();
} else {
    echo "Error: Could not delete record.";
}

$conn->close();
?>
