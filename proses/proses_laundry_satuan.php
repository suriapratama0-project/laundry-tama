<?php
include '../function/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Kalau proses hapus
    if (isset($_POST['hapus_id'])) {
        $idHapus = (int)$_POST['hapus_id'];
        if (deleteLaundrySatuan($idHapus)) {
            header("Location: ../form/managemen_jenis_laundry_satuan.php?msg=hapus_berhasil");
            exit;
        } else {
            echo "Gagal menghapus data.";
        }
    }

    // Proses Tambah Data
    elseif (isset($_POST['tambah_jenis'])) {
        $jenisPakaian = $_POST['jenis_pakaian'] ?? '';
        $harga = $_POST['harga'] ?? 0;

        if ($jenisPakaian != '' && is_numeric($harga)) {
            if (insertLaundrySatuan($jenisPakaian, $harga)) {
                header("Location: ../form/managemen_jenis_laundry_satuan.php?msg=tambah_berhasil");
                exit;
            } else {
                echo "Gagal menambahkan data.";
            }
        } else {
            echo "Data tidak valid.";
        }
    }


    // Kalau proses edit
    elseif (isset($_POST['edit_id'])) {
        $idEdit = (int)$_POST['edit_id'];
        $jenisPakaian = $_POST['jenis_pakaian'] ?? '';
        $harga = $_POST['harga'] ?? 0;

        if ($jenisPakaian != '' && is_numeric($harga)) {
            if (updateLaundrySatuan($idEdit, $jenisPakaian, $harga)) {
                header("Location: ../form/managemen_jenis_laundry_satuan.php?msg=edit_berhasil");
                exit;
            } else {
                echo "Gagal update data.";
            }
        } else {
            echo "Data tidak valid.";
        }
    } else {
        header("Location: managemen_jenis_laundry_satuan.php");
        exit;
    }
} else {
    header("Location: managemen_jenis_laundry_satuan.php");
    exit;
}
