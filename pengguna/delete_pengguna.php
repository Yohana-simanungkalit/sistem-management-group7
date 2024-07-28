<?php
include 'Pengguna.php';
include '../connect.php';

$pengguna = new Pengguna($conn);

$idPengguna = $_GET['id'];

if ($pengguna->delete($idPengguna)) {
    header("Location: read_pengguna.php");
    exit();
} else {
    echo "Error: Could not delete record.";
}

$conn->close();
?>
