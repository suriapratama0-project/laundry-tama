<?php
include '../function/function.php';

$id = $_GET['id'];
$trx = getTransaksiById($id);

if (!$trx) {
    die("Transaksi tidak ditemukan!");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Nota</title>
    <style>
        @page { size: 58mm auto; margin: 2mm; }
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .nota { width: 58mm; }
        .nota h3, .nota p { text-align: center; margin: 2px 0; }
        table { width: 100%; font-size: 11px; }
        td { padding: 2px 0; }
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
        <h3>Laundry Tama</h3>
        <p>Jl. Raya Contoh No.123</p>
        <hr>
        <p>ID: <?= $trx['id_transaksi'] ?><br>
        Nama: <?= $trx['nama_pelanggan'] ?><br>
        Tanggal: <?= $trx['transaksi_tanggal_masuk'] ?></p>
        <hr>
        <table>
            <?php if (!empty($trx['jenis_layanan'])): ?>
                <tr><td>Layanan</td><td><?= $trx['jenis_layanan'] ?></td></tr>
            <?php endif; ?>

            <?php if (!empty($trx['laundry_satuan']) && $trx['jumlah_satuan'] > 0): ?>
                <tr><td>Satuan</td><td><?= $trx['laundry_satuan'] ?> x <?= $trx['jumlah_satuan'] ?></td></tr>
            <?php endif; ?>

            <?php if ($trx['berat_kiloan'] > 0): ?>
                <tr><td>Kiloan</td><td><?= $trx['berat_kiloan'] ?> Kg (Rp<?= number_format($trx['harga_per_kilo'],0,',','.') ?>/Kg)</td></tr>
            <?php endif; ?>

            <tr><td>Total</td><td>Rp<?= number_format($trx['total_harga'],0,',','.') ?></td></tr>
        </table>
        <p class="total">TOTAL: Rp<?= number_format($trx['total_harga'],0,',','.') ?></p>
        <hr>
        <p>Terima kasih :)</p>
    </div>
</body>
</html>
