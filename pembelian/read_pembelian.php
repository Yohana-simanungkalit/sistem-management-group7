<?php
include '../header.php'; 
include 'Pembelian.php';
include '../connect.php';

$pembelian = new Pembelian($conn);
$result = $pembelian->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Pembelian</h1>
        <a href="create_pembelian.php" class="btn btn-success mb-3">Tambah Pembelian</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jumlah Pembelian</th>
                    <th>Harga Beli</th>
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
                            <td>".$row['IdPembelian']."</td>
                            <td>".$row['JumlahPembelian']."</td>
                            <td>".$row['HargaBeli']."</td>
                            <td>".$row['IdBarang']."</td>
                            <td>".$row['IdPengguna']."</td>
                            <td>
                                <a href='update_pembelian.php?id=".$row['IdPembelian']."' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='delete_pembelian.php?id=".$row['IdPembelian']."' class='btn btn-danger btn-sm'>Hapus</a>
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

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
