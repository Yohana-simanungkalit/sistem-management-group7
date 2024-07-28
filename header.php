<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Barang</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Warna latar belakang yang cerah */
            color: #333;
        }
        .navbar {
            background-color: #4a90e2; /* Warna biru cerah untuk navbar */
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .hero-section {
            background: linear-gradient(135deg, #5678f5, #8da5fc);
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .card-body {
            background-color: #ffff;
        }
        footer {
            background-color: #4a90e2;
            color: #fff;
        }
    </style>
</head>
<body>
  <!-- Navigasi Menu -->
  <nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/tk4/index.php">Beranda <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tk4/barang/read_barang.php">Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tk4/hak_akses/read_hak_akses.php">Hak Akses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tk4/pelanggan/read_pelanggan.php">Data Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tk4/pembelian/read_pembelian.php">Pembelian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tk4/pengguna/read_pengguna.php">Management Pengguna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tk4/penjualan/read_penjualan.php">Riwayat Penjualan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tk4/supplier/read_supplier.php">Data Supplier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tk4/report/report.php">Laporan</a>
        </li>
      </ul>
    </div>
  </nav>
