<?php
include '../header.php'; 
include 'Pembelian.php';
include '../connect.php';

$pembelian = new Pembelian($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPembelian = $_POST['idPembelian'];
    $jumlahPembelian = $_POST['jumlahPembelian'];
    $hargaBeli = $_POST['hargaBeli'];
    $idBarang = $_POST['idBarang'];
    $idPengguna = $_POST['idPengguna'];

    if ($pembelian->update($idPembelian, $jumlahPembelian, $hargaBeli, $idBarang, $idPengguna)) {
        header("Location: read_pembelian.php");
        exit();
    } else {
        echo "Error: Could not update record.";
    }
}

$idPembelian = $_GET['id'];
$data = $pembelian->getById($idPembelian);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembelian</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Pembelian</h1>
        <form method="POST">
            <input type="hidden" name="idPembelian" value="<?php echo $data['IdPembelian']; ?>">
            <div class="form-group">
                <label for="jumlahPembelian">Jumlah Pembelian:</label>
                <input type="number" class="form-control" name="jumlahPembelian" id="jumlahPembelian" value="<?php echo $data['JumlahPembelian']; ?>" required>
            </div>
            <div class="form-group">
                <label for="hargaBeli">Harga Beli:</label>
                <input type="number" class="form-control" name="hargaBeli" id="hargaBeli" value="<?php echo $data['HargaBeli']; ?>" required>
            </div>
            <div class="form-group">
                <label for="idBarang">Id Barang:</label>
                <input type="number" class="form-control" name="idBarang" id="idBarang" value="<?php echo $data['IdBarang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="idPengguna">Id Pengguna:</label>
                <input type="number" class="form-control" name="idPengguna" id="idPengguna" value="<?php echo $data['IdPengguna']; ?>" required>
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
