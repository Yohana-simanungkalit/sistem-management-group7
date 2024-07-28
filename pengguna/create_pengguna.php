<?php
include '../header.php'; 
include 'Pengguna.php';
include '../connect.php';

$pengguna = new Pengguna($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaPengguna = $_POST['namaPengguna'];
    $password = $_POST['password'];
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $idAkses = $_POST['idAkses'];
    
    if ($pengguna->create($namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses)) {
        header("Location: read_pengguna.php");
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
    <title>Tambah Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Pengguna</h1>
        <form method="POST">
            <div class="form-group">
                <label for="namaPengguna">Nama Pengguna:</label>
                <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="namaDepan">Nama Depan:</label>
                <input type="text" class="form-control" id="namaDepan" name="namaDepan" required>
            </div>
            <div class="form-group">
                <label for="namaBelakang">Nama Belakang:</label>
                <input type="text" class="form-control" id="namaBelakang" name="namaBelakang" required>
            </div>
            <div class="form-group">
                <label for="noHp">No Hp:</label>
                <input type="text" class="form-control" id="noHp" name="noHp" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="idAkses">Id Akses:</label>
                <input type="text" class="form-control" id="idAkses" name="idAkses" required>
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
