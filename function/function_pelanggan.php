<?php
include '../config/db.php';

function getAllPelanggan() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_pelanggan ORDER BY id_pelanggan ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function insertPelanggan($nama, $nomor, $alamat) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tb_pelanggan (nama_pelanggan, nomor_pelanggan, alamat_pelanggan) VALUES (:nama, :nomor, :alamat)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':nomor', $nomor);
    $stmt->bindParam(':alamat', $alamat);
    return $stmt->execute();
}

function deletePelanggan($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM tb_pelanggan WHERE id_pelanggan = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function updatePelanggan($id, $nama, $nomor, $alamat) {
    global $conn;
    $stmt = $conn->prepare("UPDATE tb_pelanggan SET nama_pelanggan = :nama, nomor_pelanggan = :nomor, alamat_pelanggan = :alamat WHERE id_pelanggan = :id");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':nomor', $nomor);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function getNamaPelangganById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT nama_pelanggan FROM tb_pelanggan WHERE id_pelanggan = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['nama_pelanggan'] : '';
}

