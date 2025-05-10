<?php
require_once 'Config/DB.php';
require_once 'Controllers/AreaParkir.php';
require_once 'Controllers/Kampus.php';
require_once 'Helpers/helper.php';

// ✅ Gunakan $pdo dari Config/DB.php
$area_parkir = new AreaParkir($pdo);
$kampus = new Kampus($pdo);

$area_parkir_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_area_parkir = $area_parkir_id ? $area_parkir->show($area_parkir_id) : [];
$list_kampus = $kampus->index();

if (isset($_POST['type'])) {
  if ($_POST['type'] == 'create') {
    $id = $area_parkir->create($_POST);
    echo "<script>alert('Data area parkir berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=areaparkir'</script>";
  } else if ($_POST['type'] == 'update') {
    $row = $area_parkir->update($area_parkir_id, $_POST);
    echo "<script>alert('Data area parkir $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=areaparkir'</script>";
  }
}
?>


<div class="container">
  <form method="post">
    

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <?= $area_parkir_id ? 'Edit Area Parkir' : 'Tambah Area Parkir' ?>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama">Nama Area Parkir</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_area_parkir, 'nama') ?>" required>
        </div>
        <div class="form-group">
          <label for="kapasitas">Kapasitas</label>
          <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?= getSafeFormValue($show_area_parkir, 'kapasitas') ?>" required>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= getSafeFormValue($show_area_parkir, 'keterangan') ?></textarea>
        </div>
        <div class="form-group">
          <label for="kampus_id">Kampus</label>
          <select class="form-control" id="kampus_id" name="kampus_id" required>
            <?php foreach ($list_kampus as $kampus): ?>
              <option value="<?= $kampus['id'] ?>" <?= getSafeFormValue($show_area_parkir, 'kampus_id') == $kampus['id'] ? 'selected' : '' ?>>
                <?= $kampus['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="hidden" name="type" value="<?= $area_parkir_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $area_parkir_id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</div>