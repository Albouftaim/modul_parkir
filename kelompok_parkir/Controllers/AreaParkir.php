<?php
require_once 'Config/DB.php';

class AreaParkir
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT area_parkir.*, kampus.nama AS nama_kampus FROM area_parkir JOIN kampus ON area_parkir.kampus_id = kampus.id");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM area_parkir WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO area_parkir (nama, kapasitas, keterangan, kampus_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['nama'], $data['kapasitas'], $data['keterangan'], $data['kampus_id']]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE area_parkir SET nama = ?, kapasitas = ?, keterangan = ?, kampus_id = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['nama'], $data['kapasitas'], $data['keterangan'], $data['kampus_id'], $id]);
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $stmt = $this->pdo->prepare("DELETE FROM area_parkir WHERE id = ?");
        $stmt->execute([$id]);
        return $row;
    }
}
