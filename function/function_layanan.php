<?php
include '../config/db.php';

function getAllLayanan() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_jenis_layanan ORDER BY id_jenis_layanan ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteLayanan($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM tb_jenis_layanan WHERE id_jenis_layanan = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateLayanan($id, $jenis_layanan, $harga) {
    global $conn;
    $stmt = $conn->prepare("UPDATE tb_jenis_layanan SET jenis_layanan = :layanan, harga_jenis_layanan = :harga WHERE id_jenis_layanan = :id");
    $stmt->bindParam(':layanan', $jenis_layanan);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function insertLayanan($jenis_layanan, $harga) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tb_jenis_layanan (jenis_layanan, harga_jenis_layanan) VALUES (:layanan, :harga)");
    $stmt->bindParam(':layanan', $jenis_layanan);
    $stmt->bindParam(':harga', $harga);
    return $stmt->execute();
}

function getHargaLayanan($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT harga_jenis_layanan FROM tb_jenis_layanan WHERE id_jenis_layanan = :id");
    $stmt->execute([':id' => $id]);
    $data = $stmt->fetch();
    return $data ? $data['harga_jenis_layanan'] : 0;
}




