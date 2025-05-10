<?php
require_once 'Controllers/Jenis.php';
require_once 'Helpers/helper.php';

$jenis_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_jenis = $jenis_id ? $jenis->show($jenis_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $jenis->create($_POST);
    echo "<script>alert('Data jenis berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=jenis'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $jenis->update($jenis_id, $_POST);
    echo "<script>alert('Data jenis $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=jenis'</script>";
  }
}
?>

<div class="container">
  <form method="post">

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <?= $jenis_id ? 'Edit Jenis' : 'Tambah Jenis' ?>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="idjenis">ID Jenis</label>
          <input type="text" class="form-control" id="idjenis" name="idjenis" value="<?= getSafeFormValue($show_jenis, 'idjenis') ?>" <?= $jenis_id ? 'readonly' : 'required' ?>>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_jenis, 'nama') ?>" required>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $jenis_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $jenis_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>