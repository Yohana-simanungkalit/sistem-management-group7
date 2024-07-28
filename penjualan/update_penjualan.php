<?php
include '../header.php'; 
include 'Penjualan.php';
include '../connect.php';

$penjualan = new Penjualan($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPenjualan = $_POST['idPenjualan'];
    $jumlahPenjualan = $_POST['jumlahPenjualan'];
    $hargaJual = $_POST['hargaJual'];
    $idBarang = $_POST['idBarang'];
    $idPengguna = $_POST['idPengguna'];

    if ($penjualan->update($idPenjualan, $jumlahPenjualan, $hargaJual, $idBarang, $idPengguna)) {
        header("Location: read_penjualan.php");
        exit();
    } else {
        echo "Error: Could not update record.";
    }
}

$idPenjualan = $_GET['id'];
$data = $penjualan->getById($idPenjualan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penjualan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Penjualan</h1>
        <form method="POST">
            <input type="hidden" name="idPenjualan" value="<?php echo $data['IdPenjualan']; ?>">
            <div class="form-group">
                <label>Jumlah Penjualan:</label>
                <input type="number" class="form-control" name="jumlahPenjualan" value="<?php echo $data['JumlahPenjualan']; ?>" required>
            </div>
            <div class="form-group">
                <label>Harga Jual:</label>
                <input type="number" class="form-control" name="hargaJual" value="<?php echo $data['HargaJual']; ?>" required>
            </div>
            <div class="form-group">
                <label>Id Barang:</label>
                <input type="number" class="form-control" name="idBarang" value="<?php echo $data['IdBarang']; ?>" required>
            </div>
            <div class="form-group">
                <label>Id Pengguna:</label>
                <input type="number" class="form-control" name="idPengguna" value="<?php echo $data['IdPengguna']; ?>" required>
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
