<?php
include '../config/session2.php';

if (!isset($_SESSION['id_transaksi'])) {
    echo "Tidak ada data transaksi.";
    exit;
}

$total = $_SESSION['total'];
$nama = $_SESSION['nama'];
$id = $_SESSION['id_transaksi'];

// Hapus session agar tidak tampil ulang saat refresh

?>

<!DOCTYPE html>
<html>

<head>
    <title>Transaksi Berhasil</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">Transaksi Berhasil</div>
        <div class="card-body">
            <h5 class="card-title">Nama : <?= htmlspecialchars($nama) ?></h5>
            <p class="card-text">ID Transaksi : <strong><?= $id ?></strong></p>
            <p class="card-text">Total yang harus dibayar: <strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></p>
            <a href="transaksi_baru.php" class="btn btn-primary">ke Transaksi Baru</a>
            <a href="cetak_ringkas.php" target="_blank" class="btn btn-info ms-2">
                Cetak
            </a>
            <a href="cetak_nota.php?id=<?= $id ?>" target="_blank" class="btn btn-danger ms-2">
                Cetak Rincian Nota
            </a>
        </div>
    </div>
</body>

</html>