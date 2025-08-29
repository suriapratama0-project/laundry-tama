<?php
include '../config/db.php';

function getAllLaundrySatuan() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_jenis_laundry_satuan ORDER BY id_jenis_laundry_satuan ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteLaundrySatuan($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM tb_jenis_laundry_satuan WHERE id_jenis_laundry_satuan = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateLaundrySatuan($id, $jenis_pakaian, $harga) {
    global $conn;
    $stmt = $conn->prepare("UPDATE tb_jenis_laundry_satuan SET jenis_pakaian = :jenis, harga_jenis_laundry_satuan = :harga WHERE id_jenis_laundry_satuan = :id");
    $stmt->bindParam(':jenis', $jenis_pakaian);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function insertLaundrySatuan($jenis_pakaian, $harga) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tb_jenis_laundry_satuan (jenis_pakaian, harga_jenis_laundry_satuan) VALUES (:jenis, :harga)");
    $stmt->bindParam(':jenis', $jenis_pakaian);
    $stmt->bindParam(':harga', $harga);
    return $stmt->execute();
}

function getHargaLaundrySatuan($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT harga_jenis_laundry_satuan FROM tb_jenis_laundry_satuan WHERE id_jenis_laundry_satuan = :id");
    $stmt->execute([':id' => $id]);
    $data = $stmt->fetch();
    return $data ? $data['harga_jenis_laundry_satuan'] : 0;
}




