<?php
include '../function/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Kalau proses hapus
    if (isset($_POST['hapus_id'])) {
        $idHapus = (int)$_POST['hapus_id'];
        if (deletePelanggan($idHapus)) {
            header("Location: ../form/managemen_pelanggan.php?msg=hapus_berhasil");
            exit;
        } else {
            echo "Gagal menghapus data.";
        }
    }

    // Proses Tambah Data
    elseif (isset($_POST['tambah_pelanggan'])) {
        $nama = $_POST['nama_pelanggan'] ?? '';
        $nomor = $_POST['nomor_pelanggan'] ?? '';
        $alamat = $_POST['alamat_pelanggan'] ?? '';

        if ($nama != '' && $nomor != '' && $alamat != '') {
            if (insertPelanggan($nama, $nomor, $alamat)) {
                header("Location: ../form/managemen_pelanggan.php?msg=tambah_berhasil");
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
        $nama = $_POST['nama_pelanggan'] ?? '';
        $nomor = $_POST['nomor_pelanggan'] ?? '';
        $alamat = $_POST['alamat_pelanggan'] ?? '';

        if ($nama != '' && $nomor != '' && $alamat != '' ) {
            if (updatePelanggan($idEdit, $nama, $nomor, $alamat)) {
                header("Location: ../form/managemen_pelanggan.php?msg=edit_berhasil");
                exit;
            } else {
                echo "Gagal update data.";
            }
        } else {
            echo "Data tidak valid.";
        }
    } else {
        header("Location: ../form/managemen_pelanggan.php");
        exit;
    }

} else {
    header("Location: ../form/managemen_pelanggan.php");
    exit;
}
