<?php
include 'Supplier.php';
include '../connect.php';

$supplier = new Supplier($conn);

$idSupplier = $_GET['id'];

if ($supplier->delete($idSupplier)) {
    header("Location: read_supplier.php");
    exit();
} else {
    echo "Error: Could not delete record.";
}

$conn->close();
?>
