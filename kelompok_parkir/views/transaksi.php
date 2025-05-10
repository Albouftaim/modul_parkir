<?php
require_once 'Controllers/Transaksi.php';
require_once 'Helpers/helper.php';

$transaksi = new Transaksi($pdo);
$list_transaksi = $transaksi->index();

if (isset($_POST['type']) && $_POST['type'] == 'delete') {
    $row = $transaksi->delete($_POST['id']);
    echo "<script>alert('Data transaksi dengan ID $row[id] berhasil dihapus')</script>";
    echo "<script>window.location='?url=transaksi'</script>";
}
?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="mb-2">
        <a class="btn btn-success btn-sm" href="?url=transaksi-input">Tambah Transaksi</a>
      </div>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>No Polisi</th>
            <th>Tanggal</th>
            <th>Mulai</th>
            <th>Akhir</th>
            <th>Biaya</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_transaksi as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nopol'] ?></td>
              <td><?= $row['tanggal'] ?></td>
              <td><?= $row['mulai'] ?></td>
              <td><?= $row['akhir'] ?? '-' ?></td>
              <td><?= $row['biaya'] ?></td>
              <td>
                <div class="d-flex">
                  <a href="?url=transaksi-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
                  <form method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
