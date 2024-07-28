<?php
include '../header.php'; 
include 'HakAkses.php';
include '../connect.php';

$hakAkses = new HakAkses($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAkses = $_POST['idAkses'];
    $namaAkses = $_POST['namaAkses'];
    $keterangan = $_POST['keterangan'];
    
    if ($hakAkses->update($idAkses, $namaAkses, $keterangan)) {
        header("Location: read_hak_akses.php");
        exit();
    } else {
        echo "Error: Could not update record.";
    }
}

$idAkses = $_GET['id'];
$data = $hakAkses->getById($idAkses);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Hak Akses</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Hak Akses</h1>
        <form method="POST">
            <input type="hidden" name="idAkses" value="<?php echo $data['IdAkses']; ?>">
            <div class="form-group">
                <label for="namaAkses">Nama Akses:</label>
                <input type="text" class="form-control" id="namaAkses" name="namaAkses" value="<?php echo $data['NamaAkses']; ?>" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data['Keterangan']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="read_hak_akses.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>