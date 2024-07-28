<?php
include '../header.php'; 
include 'Pelanggan.php';
include '../connect.php';

$pelanggan = new Pelanggan($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPelanggan = $_POST['idPelanggan'];
    $namaPelanggan = $_POST['namaPelanggan'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['noHp'];
    $idPengguna = $_POST['idPengguna'];
    
    if ($pelanggan->update($idPelanggan, $namaPelanggan, $alamat, $noHp, $idPengguna)) {
        header("Location: read_pelanggan.php");
        exit();
    } else {
        echo "Error: Could not update record.";
    }
}

$idPelanggan = $_GET['id'];
$data = $pelanggan->getById($idPelanggan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Pelanggan</h1>
        <form method="POST">
            <input type="hidden" name="idPelanggan" value="<?php echo $data['IdPelanggan']; ?>">
            <div class="form-group">
                <label for="namaPelanggan">Nama Pelanggan:</label>
                <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" value="<?php echo $data['NamaPelanggan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['Alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="noHp">No Hp:</label>
                <input type="text" class="form-control" id="noHp" name="noHp" value="<?php echo $data['NoHp']; ?>" required>
            </div>
            <div class="form-group">
                <label for="idPengguna">Id Pengguna:</label>
                <input type="text" class="form-control" id="idPengguna" name="idPengguna" value="<?php echo $data['IdPengguna']; ?>" required>
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
