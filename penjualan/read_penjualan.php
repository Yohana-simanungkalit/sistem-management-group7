<?php
include '../header.php'; 
include 'Penjualan.php';
include '../connect.php';

$penjualan = new Penjualan($conn);
$result = $penjualan->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjualan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Penjualan</h1>
        <a href="create_penjualan.php" class="btn btn-primary mb-3">Tambah Penjualan</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jumlah Penjualan</th>
                    <th>Harga Jual</th>
                    <th>Id Barang</th>
                    <th>Id Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['IdPenjualan']."</td>
                            <td>".$row['JumlahPenjualan']."</td>
                            <td>".$row['HargaJual']."</td>
                            <td>".$row['IdBarang']."</td>
                            <td>".$row['IdPengguna']."</td>
                            <td>
                                <a href='update_penjualan.php?id=".$row['IdPenjualan']."' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_penjualan.php?id=".$row['IdPenjualan']."' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
