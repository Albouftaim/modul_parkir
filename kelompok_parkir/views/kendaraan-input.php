<?php
require_once 'Config/DB.php';
require_once 'Controllers/Kendaraan.php';
require_once 'Helpers/helper.php';

$kendaraan = new Kendaraan($pdo);

$kendaraan_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_kendaraan = $kendaraan_id ? $kendaraan->show($kendaraan_id) : [];

$jenis_stmt = $pdo->query("SELECT * FROM jenis");
$jenis_list = $jenis_stmt->fetchAll();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $kendaraan->create($_POST);
    echo "<script>alert('Data kendaraan berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=kendaraan'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $kendaraan->update($kendaraan_id, $_POST);
    echo "<script>alert('Data kendaraan dengan nomor polisi {$row['nopol']} berhasil diperbarui')</script>";
    echo "<script>window.location='?url=kendaraan'</script>";
  }
}
?>

<div class="container">
  <form method="post">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <?= $kendaraan_id ? 'Edit Kendaraan' : 'Tambah Kendaraan' ?>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="merk">Merk</label>
          <input type="text" class="form-control" id="merk" name="merk" value="<?= getSafeFormValue($show_kendaraan, 'merk') ?>" required>
        </div>
        <div class="form-group">
          <label for="pemilik">Pemilik</label>
          <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= getSafeFormValue($show_kendaraan, 'pemilik') ?>" required>
        </div>
        <div class="form-group">
          <label for="nopol">Nomor Polisi</label>
          <input type="text" class="form-control" id="nopol" name="nopol" value="<?= getSafeFormValue($show_kendaraan, 'nopol') ?>" required>
        </div>
        <div class="form-group">
          <label for="thn_beli">Tahun Beli</label>
          <input type="number" class="form-control" id="thn_beli" name="thn_beli" value="<?= getSafeFormValue($show_kendaraan, 'thn_beli') ?>" required>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= getSafeFormValue($show_kendaraan, 'deskripsi') ?></textarea>
        </div>
        <div class="form-group">
          <label for="jenis_kendaraan_id">Jenis Kendaraan</label>
          <select class="form-control" id="jenis_kendaraan_id" name="jenis_kendaraan_id" required>
            <option value="">Pilih Jenis</option>
            <?php foreach ($jenis_list as $jenis): ?>
              <option value="<?= $jenis['id'] ?>" <?= getSafeFormValue($show_kendaraan, 'jenis_kendaraan_id') == $jenis['id'] ? 'selected' : '' ?>>
                <?= $jenis['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $kendaraan_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $kendaraan_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
