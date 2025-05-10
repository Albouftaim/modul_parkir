<?php
require_once 'Config/DB.php';

class Transaksi
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT transaksi.*, kendaraan.nopol, kendaraan.merk, area_parkir.nama AS area 
                                   FROM transaksi 
                                   JOIN kendaraan ON transaksi.kendaraan_id = kendaraan.id 
                                   JOIN area_parkir ON transaksi.area_parkir_id = area_parkir.id");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM transaksi WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO transaksi (tanggal, mulai, akhir, keterangan, biaya, kendaraan_id, area_parkir_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['tanggal'],
            $data['mulai'],
            $data['akhir'],
            $data['keterangan'],
            $data['biaya'],
            $data['kendaraan_id'],
            $data['area_parkir_id']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE transaksi SET tanggal = ?, mulai = ?, akhir = ?, keterangan = ?, biaya = ?, kendaraan_id = ?, area_parkir_id = ? 
                WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['tanggal'],
            $data['mulai'],
            $data['akhir'],
            $data['keterangan'],
            $data['biaya'],
            $data['kendaraan_id'],
            $data['area_parkir_id'],
            $id
        ]);
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $stmt = $this->pdo->prepare("DELETE FROM transaksi WHERE id = ?");
        $stmt->execute([$id]);
        return $row;
    }
}
$transaksi = new Transaksi($pdo);
