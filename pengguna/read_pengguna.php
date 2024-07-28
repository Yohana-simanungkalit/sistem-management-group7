<?php
include '../header.php'; 
include 'Pengguna.php';
include '../connect.php';

$pengguna = new Pengguna($conn);
$result = $pengguna->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Pengguna</h1>
        <a href="create_pengguna.php" class="btn btn-primary mb-3">Tambah Pengguna</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pengguna</th>
                        <th>Password</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Id Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>".$row['IdPengguna']."</td>
                                <td>".$row['NamaPengguna']."</td>
                                <td>".$row['Password']."</td>
                                <td>".$row['NamaDepan']."</td>
                                <td>".$row['NamaBelakang']."</td>
                                <td>".$row['NoHp']."</td>
                                <td>".$row['Alamat']."</td>
                                <td>".$row['IdAkses']."</td>
                                <td>
                                    <a href='update_pengguna.php?id=".$row['IdPengguna']."' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_pengguna.php?id=".$row['IdPengguna']."' class='btn btn-danger btn-sm'>Hapus</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
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
