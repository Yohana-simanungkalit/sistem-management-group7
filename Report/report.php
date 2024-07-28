<?php
include '../header.php'; 
include '../connect.php';

$sql = "SELECT 
            b.NamaBarang,
            SUM(p.JumlahPenjualan) AS TotalQuantitySold,
            SUM(p.JumlahPenjualan * p.HargaJual) AS TotalSales,
            SUM(p.JumlahPenjualan * subquery.AvgHargaBeli) AS TotalCost,
            SUM(p.JumlahPenjualan * (p.HargaJual - subquery.AvgHargaBeli)) AS TotalProfit
        FROM 
            penjualan p
        JOIN 
            barang b ON p.IdBarang = b.IdBarang
        JOIN 
            (
                SELECT 
                    IdBarang, 
                    AVG(HargaBeli) AS AvgHargaBeli
                FROM 
                    pembelian
                GROUP BY 
                    IdBarang
            ) subquery ON p.IdBarang = subquery.IdBarang
        GROUP BY 
            b.NamaBarang";


$result = $conn->query($sql);

if (!$result) {
    // Display error message
    echo "Error: " . $conn->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rugi Laba</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Laporan Rugi Laba per Barang</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Barang</th>
                    <th>Total Quantity Sold</th>
                    <th>Total Sales</th>
                    <th>Total Cost</th>
                    <th>Total Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['NamaBarang']."</td>
                            <td>".$row['TotalQuantitySold']."</td>
                            <td>".$row['TotalSales']."</td>
                            <td>".$row['TotalCost']."</td>
                            <td>".$row['TotalProfit']."</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
