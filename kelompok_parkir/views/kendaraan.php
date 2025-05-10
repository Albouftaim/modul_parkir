<?php
require_once 'Controllers/Kendaraan.php';
require_once 'Helpers/helper.php';

$list_kendaraan = $kendaraan->index();

if (isset($_POST['type']) && $_POST['type'] == 'delete') {
  $row = $kendaraan->delete($_POST['id']);
  echo "<script>alert('Data kendaraan dengan nomor polisi $row[nopol] berhasil dihapus')</script>";
  echo "<script>window.location='?url=kendaraan'</script>";
}
?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="mb-2">
        <a class="btn btn-success btn-sm" href="?url=kendaraan-input">
          Tambah Kendaraan
        </a>
      </div>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Merk</th>
            <th>Pemilik</th>
            <th>Nomor Polisi</th>
            <th>Tahun Beli</th>
            <th>Deskripsi</th>
            <th>Jenis Kendaraan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_kendaraan as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['merk'] ?></td>
              <td><?= $row['pemilik'] ?></td>
              <td><?= $row['nopol'] ?></td>
              <td><?= $row['thn_beli'] ?></td>
              <td><?= $row['deskripsi'] ?? '-' ?></td>
              <td><?= $row['jenis_nama'] ?? '-' ?></td>
              <td>
                <div class="d-flex">
                  <a href="?url=kendaraan-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
                  <form action="" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Merk</th>
            <th>Pemilik</th>
            <th>Nomor Polisi</th>
            <th>Tahun Beli</th>
            <th>Deskripsi</th>
            <th>Jenis Kendaraan</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
