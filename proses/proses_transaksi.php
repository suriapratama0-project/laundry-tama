<?php
require '../config/db.php';
require '../function/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipe         = $_POST['tipe'];
    $tgl_masuk    = $_POST['tanggal_masuk'];
    $tgl_selesai  = $_POST['tanggal_selesai'];
    $jenis_laundry = $_POST['jenis_laundry'];

    // Ambil layanan hanya jika laundry kiloan
    $id_layanan = isset($_POST['id_jenis_layanan']) ? $_POST['id_jenis_layanan'] : null;
    $harga_layanan = 0;
    if (!empty($id_layanan)) {
        $harga_layanan = getHargaLayanan($id_layanan);
    }

    if ($tipe === 'baru') {
        $nama     = $_POST['nama'];
        $nomor    = $_POST['nomor'];
        $alamat   = $_POST['alamat'];
        insertPelanggan($nama, $nomor, $alamat);

        // Ambil ID terakhir yang baru dimasukkan
        $id_pelanggan = $conn->lastInsertId();
    } else {
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama = getNamaPelangganById($id_pelanggan);
    }

    // Hitung total
    $total = 0;

    if ($jenis_laundry === 'kiloan') {
        $id_kiloan = $_POST['id_jenis_laundry_kiloan'];
        $berat = $_POST['berat'];
        $harga = getHargaLaundryKiloan($id_kiloan);
        $harga_layanan = getHargaLayanan($id_layanan);
        $total = ($harga * $berat) + $harga_layanan;

        $id_transaksi = insertTransaksi($id_pelanggan, $tgl_masuk, $tgl_selesai, $id_layanan, null, null, $id_kiloan, $berat, $total);
    } elseif ($jenis_laundry === 'satuan') {
        $id_satuan = $_POST['id_jenis_laundry_satuan'][0]; // Ambil hanya satu
        $jumlah = $_POST['jumlah'][0];
        $harga = getHargaLaundrySatuan($id_satuan);
        $harga_layanan = getHargaLayanan($id_layanan);
        $total = ($harga * $jumlah) + $harga_layanan;

        $id_transaksi = insertTransaksi($id_pelanggan, $tgl_masuk, $tgl_selesai, $id_layanan, $id_satuan, $jumlah, null, null, $total);
    }

    session_start();
    $_SESSION['total'] = $total;
    $_SESSION['nama'] = $nama;
    $_SESSION['id_transaksi'] = $id_transaksi;

    header("Location: ../form/sukses.php");
    exit;
}
