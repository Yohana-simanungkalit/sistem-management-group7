<?php
include '../header.php'; 
include 'Pembelian.php';
include '../connect.php';

$pembelian = new Pembelian($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlahPembelian = $_POST['jumlahPembelian'];
    $hargaBeli = $_POST['hargaBeli'];
    $idBarang = $_POST['idBarang'];
    $idPengguna = $_POST['idPengguna'];
    
    if ($pembelian->create($jumlahPembelian, $hargaBeli, $idBarang, $idPengguna)) {
        header("Location: read_pembelian.php");
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
    <title>Tambah Pembelian</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Pembelian</h1>
        <form method="POST">
            <div class="form-group">
                <label for="jumlahPembelian">Jumlah Pembelian:</label>
                <input type="number" class="form-control" name="jumlahPembelian" id="jumlahPembelian" required>
            </div>
            <div class="form-group">
                <label for="hargaBeli">Harga Beli:</label>
                <input type="number" class="form-control" name="hargaBeli" id="hargaBeli" required>
            </div>
            <div class="form-group">
                <label for="idBarang">Id Barang:</label>
                <input type="number" class="form-control" name="idBarang" id="idBarang" required>
            </div>
            <div class="form-group">
                <label for="idPengguna">Id Pengguna:</label>
                <input type="number" class="form-control" name="idPengguna" id="idPengguna" required>
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
