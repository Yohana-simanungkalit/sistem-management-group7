<?php
include '../header.php'; 
include 'Pelanggan.php';
include '../connect.php';

$pelanggan = new Pelanggan($conn);
$result = $pelanggan->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Pelanggan</h1>
        <a href="create_pelanggan.php" class="btn btn-primary mb-3">Tambah Pelanggan</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Id Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['IdPelanggan']."</td>
                            <td>".$row['NamaPelanggan']."</td>
                            <td>".$row['Alamat']."</td>
                            <td>".$row['NoHp']."</td>
                            <td>".$row['IdPengguna']."</td>
                            <td>
                                <a href='update_pelanggan.php?id=".$row['IdPelanggan']."' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='delete_pelanggan.php?id=".$row['IdPelanggan']."' class='btn btn-sm btn-danger'>Hapus</a>
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
