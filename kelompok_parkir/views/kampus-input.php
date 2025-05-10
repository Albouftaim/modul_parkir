<?php
require_once 'Controllers/Kampus.php';
require_once 'Helpers/helper.php';

$kampus_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_kampus = $kampus_id ? $kampus->show($kampus_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $kampus->create($_POST);
    echo "<script>alert('Data kampus berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=kampus'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $kampus->update($kampus_id, $_POST);
    echo "<script>alert('Data kampus $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=kampus'</script>";
  }
}
?>

<div class="container">
  <form method="post">

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <?= $kampus_id ? 'Edit Kampus' : 'Tambah Kampus' ?>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama Kampus</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_kampus, 'nama') ?>" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= getSafeFormValue($show_kampus, 'alamat') ?></textarea>
        </div>
        <div class="form-group">
          <label for="latitude">Latitude</label>
          <input type="text" class="form-control" id="latitude" name="latitude" value="<?= getSafeFormValue($show_kampus, 'latitude') ?>" required>
        </div>
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" class="form-control" id="longitude" name="longitude" value="<?= getSafeFormValue($show_kampus, 'longitude') ?>" required>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $kampus_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $kampus_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>