<?php
require_once 'Config/DB.php';

class Kendaraan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("
            SELECT kendaraan.*, jenis.nama AS jenis_nama
            FROM kendaraan
            LEFT JOIN jenis ON kendaraan.jenis_kendaraan_id = jenis.id
        ");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT kendaraan.*, jenis.nama AS jenis_nama
            FROM kendaraan
            LEFT JOIN jenis ON kendaraan.jenis_kendaraan_id = jenis.id
            WHERE kendaraan.id = :id
        ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO kendaraan (merk, pemilik, nopol, thn_beli, deskripsi, jenis_kendaraan_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['merk'],
            $data['pemilik'],
            $data['nopol'],
            $data['thn_beli'],
            $data['deskripsi'],
            $data['jenis_kendaraan_id']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE kendaraan SET merk = ?, pemilik = ?, nopol = ?, thn_beli = ?, deskripsi = ?, jenis_kendaraan_id = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['merk'],
            $data['pemilik'],
            $data['nopol'],
            $data['thn_beli'],
            $data['deskripsi'],
            $data['jenis_kendaraan_id'],
            $id
        ]);
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM kendaraan WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $row;
    }
}

$kendaraan = new Kendaraan($pdo);
