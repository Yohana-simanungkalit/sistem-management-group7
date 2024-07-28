<?php
include '../header.php'; 
include 'Pengguna.php';
include '../connect.php';

$pengguna = new Pengguna($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPengguna = $_POST['idPengguna'];
    $namaPengguna = $_POST['namaPengguna'];
    $password = $_POST['password'];
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $idAkses = $_POST['idAkses'];
    
    if ($pengguna->update($idPengguna, $namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses)) {
        header("Location: read_pengguna.php");
        exit();
    } else {
        echo "Error: Could not update record.";
    }
}

$idPengguna = $_GET['id'];
$data = $pengguna->getById($idPengguna);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Pengguna</h1>
        <form method="POST">
            <input type="hidden" name="idPengguna" value="<?php echo $data['IdPengguna']; ?>">
            <div class="form-group">
                <label>Nama Pengguna:</label>
                <input type="text" name="namaPengguna" class="form-control" value="<?php echo $data['NamaPengguna']; ?>" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="text" name="password" class="form-control" value="<?php echo $data['Password']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Depan:</label>
                <input type="text" name="namaDepan" class="form-control" value="<?php echo $data['NamaDepan']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Belakang:</label>
                <input type="text" name="namaBelakang" class="form-control" value="<?php echo $data['NamaBelakang']; ?>" required>
            </div>
            <div class="form-group">
                <label>No Hp:</label>
                <input type="text" name="noHp" class="form-control" value="<?php echo $data['NoHp']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $data['Alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label>Id Akses:</label>
                <input type="text" name="idAkses" class="form-control" value="<?php echo $data['IdAkses']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
