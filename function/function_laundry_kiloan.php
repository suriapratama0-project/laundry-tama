<?php
include '../config/db.php';

function getAllLaundryKiloan() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_jenis_laundry_kiloan");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateLaundryKiloan($id, $harga) {
    global $conn;
    $stmt = $conn->prepare("UPDATE tb_jenis_laundry_kiloan SET harga_jenis_laundry_kiloan = :harga WHERE id_jenis_laundry_kiloan = :id");
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function getHargaLaundryKiloan($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT harga_jenis_laundry_kiloan FROM tb_jenis_laundry_kiloan WHERE id_jenis_laundry_kiloan = :id");
    $stmt->execute([':id' => $id]);
    $data = $stmt->fetch();
    return $data ? $data['harga_jenis_laundry_kiloan'] : 0;
}




