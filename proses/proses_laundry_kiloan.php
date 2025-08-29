<?php
include '../function/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Kalau proses edit
    if (isset($_POST['edit_id'])) {
        $idEdit = (int)$_POST['edit_id'];
        $harga = $_POST['harga'] ?? 0;

        if (is_numeric($harga)) {
            if (updateLaundryKiloan($idEdit,$harga)) {
                header("Location: ../form/managemen_jenis_laundry_kiloan.php?msg=edit_berhasil");
                exit;
            } else {
                echo "Gagal update data.";
            }
        } else {
            echo "Data tidak valid.";
        }
    } else {
        header("Location: ../form/managemen_jenis_laundry_kiloan.php");
        exit;
    }
} else {
    header("Location: ../form/managemen_jenis_laundry_kiloan.php");
    exit;
}
