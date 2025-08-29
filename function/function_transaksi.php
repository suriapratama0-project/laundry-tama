<?php
include '../config/db.php';


function insertTransaksi($id_pelanggan, $tgl_masuk, $tgl_selesai, $id_layanan, $total, $id_satuan = 0, $id_kiloan = 0)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tb_transaksi (
        id_pelanggan,
        transaksi_tanggal_masuk,
        transaksi_tanggal_selesai,
        id_jenis_layanan,
        id_jenis_laundry_satuan,
        id_jenis_laundry_kiloan,
        total_harga
    ) VALUES (
        :id_pelanggan,
        :tgl_masuk,
        :tgl_selesai,
        :id_layanan,
        :id_satuan,
        :id_kiloan,
        :total
    )");

    $stmt->execute([
        ':id_pelanggan' => $id_pelanggan,
        ':tgl_masuk' => $tgl_masuk,
        ':tgl_selesai' => $tgl_selesai,
        ':id_layanan' => $id_layanan,
        ':id_satuan' => $id_satuan,
        ':id_kiloan' => $id_kiloan,
        ':total' => $total
    ]);

    return $conn->lastInsertId();
}




