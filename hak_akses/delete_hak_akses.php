<?php
include 'HakAkses.php';
include '../connect.php';

$hakAkses = new HakAkses($conn);

$idAkses = $_GET['id'];

if ($hakAkses->delete($idAkses)) {
    header("Location: read_hak_akses.php");
    exit();
} else {
    echo "Error: Could not delete record.";
}

$conn->close();
?>
