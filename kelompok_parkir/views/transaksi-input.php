<?php
require_once 'Controllers/Transaksi.php';
require_once 'Controllers/Kendaraan.php';
require_once 'Controllers/AreaParkir.php';
require_once 'Helpers/helper.php';

$transaksi = new Transaksi($pdo);
$kendaraan = new Kendaraan($pdo);
$areaParkir = new AreaParkir($pdo); // ✅ tambahkan ini

$transaksi_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_transaksi = $transaksi_id ? $transaksi->show($transaksi_id) : [];

$list_kendaraan = $kendaraan->index();
$list_area = $areaParkir->index(); // ✅ sekarang tidak error


if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $transaksi->create($_POST);
    echo "<script>alert('Data transaksi berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=transaksi'</script>";
  } elseif ($_POST['type'] == 'update') {
    $row = $transaksi->update($transaksi_id, $_POST);
    echo "<script>alert('Data transaksi berhasil diperbarui')</script>";
    echo "<script>window.location='?url=transaksi'</script>";
  }
}
?>

<div class="container">
  <form method="post">
    <div class="card">
      <div class="card-header">
        <div class="card-title"><?= $transaksi_id ? 'Edit Transaksi' : 'Tambah Transaksi' ?></div>
      </div>
      <div class="card-body">

        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" name="tanggal" value="<?= getSafeFormValue($show_transaksi, 'tanggal') ?>" required>
        </div>

        <div class="form-group">
          <label for="mulai">Waktu Mulai</label>
          <input type="time" class="form-control" name="mulai" value="<?= getSafeFormValue($show_transaksi, 'mulai') ?>" required>
        </div>

        <div class="form-group">
          <label for="akhir">Waktu Akhir</label>
          <input type="time" class="form-control" name="akhir" value="<?= getSafeFormValue($show_transaksi, 'akhir') ?>">
        </div>

        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea class="form-control" name="keterangan"><?= getSafeFormValue($show_transaksi, 'keterangan') ?></textarea>
        </div>

        <div class="form-group">
          <label for="biaya">Biaya</label>
          <input type="number" class="form-control" name="biaya" value="<?= getSafeFormValue($show_transaksi, 'biaya') ?>" required>
        </div>

        <div class="form-group">
          <label for="kendaraan_id">Kendaraan</label>
          <select class="form-control" name="kendaraan_id" required>
            <?php foreach ($list_kendaraan as $k): ?>
              <option value="<?= $k['id'] ?>" <?= getSafeFormValue($show_transaksi, 'kendaraan_id') == $k['id'] ? 'selected' : '' ?>>
                <?= $k['nopol'] ?> - <?= $k['merk'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="area_parkir_id">Area Parkir</label>
          <select class="form-control" name="area_parkir_id" required>
            <?php foreach ($list_area as $a): ?>
              <option value="<?= $a['id'] ?>" <?= getSafeFormValue($show_transaksi, 'area_parkir_id') == $a['id'] ? 'selected' : '' ?>>
                <?= $a['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

      </div>
      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $transaksi_id ? 'update' : 'create' ?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>
