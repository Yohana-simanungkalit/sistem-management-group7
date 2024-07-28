<?php
include '../header.php'; 
include 'Barang.php';
include '../connect.php';

$barang = new Barang($conn);
$result = $barang->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Barang</h1>
        <a href="create_barang.php" class="btn btn-primary mb-3">Tambah Barang</a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Keterangan</th>
                    <th>Satuan</th>
                    <th>Id Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['IdBarang']."</td>
                            <td>".$row['NamaBarang']."</td>
                            <td>".$row['Keterangan']."</td>
                            <td>".$row['Satuan']."</td>
                            <td>".$row['IdPengguna']."</td>
                            <td>
                                <a href='update_barang.php?id=".$row['IdBarang']."' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='delete_barang.php?id=".$row['IdBarang']."' class='btn btn-sm btn-danger'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
