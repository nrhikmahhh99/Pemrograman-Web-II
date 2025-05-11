<?php
require_once 'Koneksi.php';
$koneksi = koneksiDB();

$members = getData($koneksi, 'member');
$books = getData($koneksi, 'buku');

function generateId($koneksi, $table, $column){
    try {
        $sql = "SELECT MAX($column) AS max_id FROM $table";
        $stmt = $koneksi->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $max_id = $result['max_id'];
        return $max_id === null ? 1 : $max_id + 1;
    } catch(PDOException $e) {
        die("Error generateId: " . $e->getMessage());
    }
}

function getById($koneksi, $table, $column, $id){
    try {
        $sql = "SELECT * FROM $table WHERE $column = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("Error getById: " . $e->getMessage());
    }
}

function insertData($koneksi, $table, $data){
    try {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute(array_values($data));
        return true;
    } catch(PDOException $e) {
        die("Error insertData: " . $e->getMessage());
    }
}

function updateData($koneksi, $table, $data, $id_column, $id_value){
    try {
        $columns = implode(" = ?, ", array_keys($data)) . " = ?";
        $sql = "UPDATE $table SET $columns WHERE $id_column = ?";
        $stmt = $koneksi->prepare($sql);
        $data_values = array_values($data);
        $data_values[] = $id_value;
        $stmt->execute($data_values);
        return true;
    } catch(PDOException $e) {
        die("Error updateData: " . $e->getMessage());
    }
}

function deleteData($koneksi, $table, $column, $id){
    try {
        $sql = "DELETE FROM $table WHERE $column = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$id]);
        return true;
    } catch(PDOException $e) {
        die("Error deleteData: " . $e->getMessage());
    }
}

function getData($koneksi, $table){
    try {
        $sql = "SELECT * FROM $table";
        $stmt = $koneksi->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("Error getData: " . $e->getMessage());
    }
}

function getPeminjamanLengkap($koneksi){
    try {
        $sql = "SELECT p.*, m.nama_member, b.judul_buku
                FROM peminjaman p
                JOIN member m ON p.id_member = m.id_member
                JOIN buku b ON p.id_buku = b.id_buku";
        $stmt = $koneksi->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error getPeminjamanLengkap: " . $e->getMessage());
    }
}
?>
