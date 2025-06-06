<?php
require_once 'Config/DB.php';

class Kampus {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        return $this->pdo->query("SELECT * FROM kampus")->fetchAll();
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM kampus WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO kampus (nama, alamat, latitude, longitude) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['nama'], $data['alamat'], $data['latitude'], $data['longitude']]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data) {
        $sql = "UPDATE kampus SET nama = ?, alamat = ?, latitude = ?, longitude = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['nama'], $data['alamat'], $data['latitude'], $data['longitude'], $id]);
        return $this->show($id);
    }

    public function delete($id) {
        $row = $this->show($id);
        $stmt = $this->pdo->prepare("DELETE FROM kampus WHERE id = ?");
        $stmt->execute([$id]);
        return $row;
    }
}

// Membuat objek Kampus dengan koneksi PDO
$kampus = new Kampus($pdo);
