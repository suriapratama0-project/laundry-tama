<?php

include __DIR__ . '/../config/db.php';
// get all
function getAllLaundryKiloan()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_jenis_laundry_kiloan");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllLaundrySatuan()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_jenis_laundry_satuan ORDER BY id_jenis_laundry_satuan ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllLayanan()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_jenis_layanan ORDER BY id_jenis_layanan ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllPelanggan()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_pelanggan ORDER BY id_pelanggan ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllTransaksiLengkap()
{
    global $conn;
    $stmt = $conn->prepare("
        SELECT 
            t.id_transaksi,
            p.nama_pelanggan,
            p.nomor_pelanggan,
            t.transaksi_tanggal_masuk,
            t.transaksi_tanggal_selesai,
            jl.jenis_layanan,
            js.jenis_pakaian AS laundry_satuan,
            t.jumlah_satuan,
            jk.harga_jenis_laundry_kiloan AS laundry_kiloan,
            t.berat_kiloan,
            t.total_harga
        FROM tb_transaksi t
        JOIN tb_pelanggan p ON t.id_pelanggan = p.id_pelanggan
        LEFT JOIN tb_jenis_layanan jl ON t.id_jenis_layanan = jl.id_jenis_layanan
        LEFT JOIN tb_jenis_laundry_satuan js ON t.id_jenis_laundry_satuan = js.id_jenis_laundry_satuan
        LEFT JOIN tb_jenis_laundry_kiloan jk ON t.id_jenis_laundry_kiloan = jk.id_jenis_laundry_kiloan
        ORDER BY t.id_transaksi DESC
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



// get satuan
function getHargaLaundryKiloan($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT harga_jenis_laundry_kiloan FROM tb_jenis_laundry_kiloan WHERE id_jenis_laundry_kiloan = :id");
    $stmt->execute([':id' => $id]);
    $data = $stmt->fetch();
    return $data ? $data['harga_jenis_laundry_kiloan'] : 0;
}
function getHargaLaundrySatuan($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT harga_jenis_laundry_satuan FROM tb_jenis_laundry_satuan WHERE id_jenis_laundry_satuan = :id");
    $stmt->execute([':id' => $id]);
    $data = $stmt->fetch();
    return $data ? $data['harga_jenis_laundry_satuan'] : 0;
}
function getHargaLayanan($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT harga_jenis_layanan FROM tb_jenis_layanan WHERE id_jenis_layanan = :id");
    $stmt->execute([':id' => $id]);
    $data = $stmt->fetch();
    return $data ? $data['harga_jenis_layanan'] : 0;
}
function getNamaPelangganById($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT nama_pelanggan FROM tb_pelanggan WHERE id_pelanggan = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['nama_pelanggan'] : '';
}

function getTransaksiById($id)
{
    global $conn;

    $sql = "SELECT t.*, 
                   p.nama_pelanggan, 
                   p.nomor_pelanggan,
                   l.jenis_layanan,
                   s.jenis_pakaian AS laundry_satuan,
                   k.harga_jenis_laundry_kiloan AS harga_per_kilo
            FROM tb_transaksi t
            JOIN tb_pelanggan p ON t.id_pelanggan = p.id_pelanggan
            LEFT JOIN tb_jenis_layanan l ON t.id_jenis_layanan = l.id_jenis_layanan
            LEFT JOIN tb_jenis_laundry_satuan s ON t.id_jenis_laundry_satuan = s.id_jenis_laundry_satuan
            LEFT JOIN tb_jenis_laundry_kiloan k ON t.id_jenis_laundry_kiloan = k.id_jenis_laundry_kiloan
            WHERE t.id_transaksi = :id
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
// Ambil total pelanggan
function getTotalPelanggan()
{
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM tb_pelanggan");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}

// Ambil total transaksi
function getTotalTransaksi()
{
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM tb_transaksi");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}

// Ambil total pendapatan
function getTotalPendapatan()
{
    global $conn;
    $stmt = $conn->prepare("SELECT SUM(total_harga) as total FROM tb_transaksi");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}
// Total Pelanggan Harian
function getTotalPelangganHarian() {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM tb_pelanggan WHERE DATE(NOW()) = DATE(created_at)");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}

// Total Pelanggan Bulanan
function getTotalPelangganBulanan() {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM tb_pelanggan WHERE MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}

// Total Transaksi Harian
function getTotalTransaksiHarian() {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM tb_transaksi WHERE DATE(transaksi_tanggal_masuk) = CURDATE()");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}

// Total Transaksi Bulanan
function getTotalTransaksiBulanan() {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM tb_transaksi WHERE MONTH(transaksi_tanggal_masuk) = MONTH(CURDATE()) AND YEAR(transaksi_tanggal_masuk) = YEAR(CURDATE())");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}

// Total Pendapatan Harian
function getTotalPendapatanHarian() {
    global $conn;
    $stmt = $conn->prepare("SELECT SUM(total_harga) as total FROM tb_transaksi WHERE DATE(transaksi_tanggal_masuk) = CURDATE()");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}

// Total Pendapatan Bulanan
function getTotalPendapatanBulanan() {
    global $conn;
    $stmt = $conn->prepare("SELECT SUM(total_harga) as total FROM tb_transaksi WHERE MONTH(transaksi_tanggal_masuk) = MONTH(CURDATE()) AND YEAR(transaksi_tanggal_masuk) = YEAR(CURDATE())");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['total'] : 0;
}



// updated
function updateLaundryKiloan($id, $harga)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE tb_jenis_laundry_kiloan SET harga_jenis_laundry_kiloan = :harga WHERE id_jenis_laundry_kiloan = :id");
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
function updateLaundrySatuan($id, $jenis_pakaian, $harga)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE tb_jenis_laundry_satuan SET jenis_pakaian = :jenis, harga_jenis_laundry_satuan = :harga WHERE id_jenis_laundry_satuan = :id");
    $stmt->bindParam(':jenis', $jenis_pakaian);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
function updateLayanan($id, $jenis_layanan, $harga)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE tb_jenis_layanan SET jenis_layanan = :layanan, harga_jenis_layanan = :harga WHERE id_jenis_layanan = :id");
    $stmt->bindParam(':layanan', $jenis_layanan);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
function updatePelanggan($id, $nama, $nomor, $alamat)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE tb_pelanggan SET nama_pelanggan = :nama, nomor_pelanggan = :nomor, alamat_pelanggan = :alamat WHERE id_pelanggan = :id");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':nomor', $nomor);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}


// delete
function deleteLaundrySatuan($id)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM tb_jenis_laundry_satuan WHERE id_jenis_laundry_satuan = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
function deleteLayanan($id)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM tb_jenis_layanan WHERE id_jenis_layanan = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
function deletePelanggan($id)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM tb_pelanggan WHERE id_pelanggan = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}


// insert
function insertLaundrySatuan($jenis_pakaian, $harga)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tb_jenis_laundry_satuan (jenis_pakaian, harga_jenis_laundry_satuan) VALUES (:jenis, :harga)");
    $stmt->bindParam(':jenis', $jenis_pakaian);
    $stmt->bindParam(':harga', $harga);
    return $stmt->execute();
}
function insertLayanan($jenis_layanan, $harga)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tb_jenis_layanan (jenis_layanan, harga_jenis_layanan) VALUES (:layanan, :harga)");
    $stmt->bindParam(':layanan', $jenis_layanan);
    $stmt->bindParam(':harga', $harga);
    return $stmt->execute();
}
function insertPelanggan($nama, $nomor, $alamat)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tb_pelanggan (nama_pelanggan, nomor_pelanggan, alamat_pelanggan) VALUES (:nama, :nomor, :alamat)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':nomor', $nomor);
    $stmt->bindParam(':alamat', $alamat);
    return $stmt->execute();
}
function insertTransaksi($id_pelanggan, $tgl_masuk, $tgl_selesai, $id_layanan, $id_satuan, $jumlah_satuan, $id_kiloan, $berat_kiloan, $total)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tb_transaksi (
        id_pelanggan,
        transaksi_tanggal_masuk,
        transaksi_tanggal_selesai,
        id_jenis_layanan,
        id_jenis_laundry_satuan,
        jumlah_satuan,
        id_jenis_laundry_kiloan,
        berat_kiloan,
        total_harga
    ) VALUES (
        :id_pelanggan,
        :tgl_masuk,
        :tgl_selesai,
        :id_layanan,
        :id_satuan,
        :jumlah_satuan,
        :id_kiloan,
        :berat_kiloan,
        :total
    )");

    $stmt->execute([
        ':id_pelanggan' => $id_pelanggan,
        ':tgl_masuk' => $tgl_masuk,
        ':tgl_selesai' => $tgl_selesai,
        ':id_layanan' => $id_layanan,
        ':id_satuan' => $id_satuan,
        ':jumlah_satuan' => $jumlah_satuan,
        ':id_kiloan' => $id_kiloan,
        ':berat_kiloan' => $berat_kiloan,
        ':total' => $total
    ]);

    return $conn->lastInsertId();
}
