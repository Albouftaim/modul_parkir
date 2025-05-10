<?php
// File: views/dashboard.php

require_once 'Controllers/Kendaraan.php';
require_once 'Controllers/Jenis.php';
require_once 'Controllers/AreaParkir.php';
require_once 'Controllers/Transaksi.php';
require_once 'Controllers/Kampus.php';

// Ambil nama user
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$username = $_SESSION['username'] ?? 'Guest';

// Inisialisasi objek-objek controller
$kendaraan = new Kendaraan($pdo);
$jenis = new Jenis($pdo);
$area_parkir = new AreaParkir($pdo);
$transaksi = new Transaksi($pdo);
$kampus = new Kampus($pdo);

// Mengambil total kendaraan, jenis, area parkir, transaksi, dan kampus
$total_kendaraan = count($kendaraan->index());
$total_jenis = count($jenis->index());
$total_area_parkir = count($area_parkir->index());
$total_transaksi = count($transaksi->index());
$total_kampus = count($kampus->index());
?>

<!-- Tempel CSS -->
<style>
  /* Sesuaikan gaya CSS sesuai dengan desain yang diinginkan */
</style>

<!-- Isi Dashboard -->
<link rel="shortcut icon" href="images/parking.jpeg" type="image/x-icon">
<div class="container mt-4">
  <h2 class="text-center">Selamat datang di Dashboard, <strong><?= htmlspecialchars($username) ?></strong>!</h2>
  <div class="row justify-content-center">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?= $total_kendaraan ?></h3>
          <p>Total Kendaraan</p>
        </div>
        <div class="icon">
          <i class="fas fa-car"></i>
        </div>
        <a href="?url=kendaraan" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= $total_jenis ?></h3>
          <p>Total Jenis Kendaraan</p>
        </div>
        <div class="icon">
          <i class="fas fa-tags"></i>
        </div>
        <a href="?url=jenis" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $total_area_parkir ?></h3>
          <p>Total Area Parkir</p>
        </div>
        <div class="icon">
          <i class="fas fa-parking"></i>
        </div>
        <a href="?url=areaparkir" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?= $total_transaksi ?></h3>
          <p>Total Transaksi</p>
        </div>
        <div class="icon">
          <i class="fas fa-exchange-alt"></i>
        </div>
        <a href="?url=transaksi" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3><?= $total_kampus ?></h3>
          <p>Total Kampus</p>
        </div>
        <div class="icon">
          <i class="fas fa-university"></i>
        </div>
        <a href="?url=kampus" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>
