<?php
include '../header.php'; 
include 'Penjualan.php';
include '../connect.php';

$penjualan = new Penjualan($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlahPenjualan = $_POST['jumlahPenjualan'];
    $hargaJual = $_POST['hargaJual'];
    $idBarang = $_POST['idBarang'];
    $idPengguna = $_POST['idPengguna'];
    
    if ($penjualan->create($jumlahPenjualan, $hargaJual, $idBarang, $idPengguna)) {
        header("Location: read_penjualan.php");
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
    <title>Tambah Penjualan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Penjualan</h1>
        <form method="POST">
            <div class="form-group">
                <label>Jumlah Penjualan:</label>
                <input type="number" class="form-control" name="jumlahPenjualan" required>
            </div>
            <div class="form-group">
                <label>Harga Jual:</label>
                <input type="number" class="form-control" name="hargaJual" required>
            </div>
            <div class="form-group">
                <label>Id Barang:</label>
                <input type="number" class="form-control" name="idBarang" required>
            </div>
            <div class="form-group">
                <label>Id Pengguna:</label>
                <input type="number" class="form-control" name="idPengguna" required>
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
