<?php
include '../header.php'; 
include 'Barang.php';
include '../connect.php';

$barang = new Barang($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaBarang = $_POST['namaBarang'];
    $keterangan = $_POST['keterangan'];
    $satuan = $_POST['satuan'];
    $idPengguna = $_POST['idPengguna'];
    
    if ($barang->create($namaBarang, $keterangan, $satuan, $idPengguna)) {
        header("Location: read_barang.php");
        exit();
    } else {
        echo "Error: Could not create record.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Barang</h1>
        <form method="POST">
            <div class="form-group">
                <label for="namaBarang">Nama Barang:</label>
                <input type="text" class="form-control" id="namaBarang" name="namaBarang" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
            </div>
            <div class="form-group">
                <label for="satuan">Satuan:</label>
                <input type="text" class="form-control" id="satuan" name="satuan" required>
            </div>
            <div class="form-group">
                <label for="idPengguna">Id Pengguna:</label>
                <input type="text" class="form-control" id="idPengguna" name="idPengguna" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="read_barang.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
