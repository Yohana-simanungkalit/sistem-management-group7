<?php
include '../header.php'; 
include 'HakAkses.php';
include '../connect.php';

$hakAkses = new HakAkses($conn);
$result = $hakAkses->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Hak Akses</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Hak Akses</h1>
        <a href="create_hak_akses.php" class="btn btn-success mb-3">Tambah Hak Akses</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Akses</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['IdAkses']."</td>
                            <td>".$row['NamaAkses']."</td>
                            <td>".$row['Keterangan']."</td>
                            <td>
                                <a href='update_hak_akses.php?id=".$row['IdAkses']."' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='delete_hak_akses.php?id=".$row['IdAkses']."' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Tidak ada data</td></tr>";
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
