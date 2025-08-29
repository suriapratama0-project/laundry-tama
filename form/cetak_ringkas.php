<?php
include '../config/session2.php';

if (!isset($_SESSION['id_transaksi'])) {
    echo "Tidak ada data transaksi.";
    exit;
}

$total = $_SESSION['total'];
$nama  = $_SESSION['nama'];
$id    = $_SESSION['id_transaksi'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Hasil Transaksi</title>
    <style>
        @page { size: 58mm auto; margin: 2mm; }
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .nota { width: 58mm; text-align: center; }
        .nota h3 { margin: 5px 0; }
        .nota p { margin: 3px 0; }
        .total { 
            border-top: 1px dashed black; 
            margin-top: 5px; 
            padding-top: 5px; 
            font-weight: bold;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="nota">
        <hr>
        <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
        <p><strong>ID Transaksi:</strong> <?= $id ?></p>
        <p class="total">TOTAL: Rp <?= number_format($total, 0, ',', '.') ?></p>
        <hr>
    </div>
</body>
</html>
