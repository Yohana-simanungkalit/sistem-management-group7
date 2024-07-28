<?php
include '../header.php'; 
include 'Barang.php';
include '../connect.php';

$barang = new Barang($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idBarang = $_POST['idBarang'];
    $namaBarang = $_POST['namaBarang'];
    $keterangan = $_POST['keterangan'];
    $satuan = $_POST['satuan'];
    $idPengguna = $_POST['idPengguna'];
    
    if ($barang->update($idBarang, $namaBarang, $keterangan, $satuan, $idPengguna)) {
        header("Location: read_barang.php");
        exit();
    } else {
        echo "Error: Could not update record.";
    }
}

$idBarang = $_GET['id'];
$data = $barang->getById($idBarang);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Barang</h1>
        <form method="POST">
            <input type="hidden" name="idBarang" value="<?php echo $data['IdBarang']; ?>">
            <div class="form-group">
                <label for="namaBarang">Nama Barang:</label>
                <input type="text" class="form-control" id="namaBarang" name="namaBarang" value="<?php echo $data['NamaBarang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data['Keterangan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="satuan">Satuan:</label>
                <input type="text" class="form-control" id="satuan" name="satuan" value="<?php echo $data['Satuan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="idPengguna">Id Pengguna:</label>
                <input type="number" class="form-control" id="idPengguna" name="idPengguna" value="<?php echo $data['IdPengguna']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="read_barang.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
