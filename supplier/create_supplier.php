<?php
include '../header.php'; 
include 'Supplier.php';
include '../connect.php';

$supplier = new Supplier($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaSupplier = $_POST['namaSupplier'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['noHp'];
    $idPengguna = $_POST['idPengguna'];
    
    if ($supplier->create($namaSupplier, $alamat, $noHp, $idPengguna)) {
        header("Location: read_supplier.php");
        exit();
    } else {
        echo "Error: Could not create record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Supplier</h1>
        <form method="POST">
            <div class="form-group">
                <label>Nama Supplier:</label>
                <input type="text" name="namaSupplier" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No Hp:</label>
                <input type="text" name="noHp" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Id Pengguna:</label>
                <input type="number" name="idPengguna" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
