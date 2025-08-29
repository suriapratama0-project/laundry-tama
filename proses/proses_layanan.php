<?php
include '../function/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Kalau proses hapus
    if (isset($_POST['hapus_id'])) {
        $idHapus = (int)$_POST['hapus_id'];
        if (deleteLayanan($idHapus)) {
            header("Location: ../form/managemen_jenis_layanan.php?msg=hapus_berhasil");
            exit;
        } else {
            echo "Gagal menghapus data.";
        }
    }

    // Proses Tambah Data
    elseif (isset($_POST['tambah_jenis'])) {
        $jenisLayanan = $_POST['jenis_layanan'] ?? '';
        $harga = $_POST['harga'] ?? 0;

        if ($jenisLayanan != '' && is_numeric($harga)) {
            if (insertLayanan($jenisLayanan, $harga)) {
                header("Location: ../form/managemen_jenis_layanan.php?msg=tambah_berhasil");
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
        $jenisLayanan = $_POST['jenis_layanan'] ?? '';
        $harga = $_POST['harga'] ?? 0;

        if ($jenisLayanan != '' && is_numeric($harga)) {
            if (updateLayanan($idEdit, $jenisLayanan, $harga)) {
                header("Location: ../form/managemen_jenis_layanan.php?msg=edit_berhasil");
                exit;
            } else {
                echo "Gagal update data.";
            }
        } else {
            echo "Data tidak valid.";
        }
    } else {
        header("Location: managemen_jenis_layanan.php");
        exit;
    }
} else {
    header("Location: managemen_jenis_layanan.php");
    exit;
}
