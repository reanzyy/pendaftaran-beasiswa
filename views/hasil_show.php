<?php
$result = query("SELECT * FROM pendaftar ORDER BY id DESC");

// Handle delete action
if (isset($_POST['delete'])) {
  if (delete($_POST)) {
    header("Location: ./index.php?page=hasil&action=show&message=delete");
    exit();
  }
}

// Handle verification action
if (isset($_POST['verify'])) {
  if (verification($_POST)) {
    header("Location: ./index.php?page=hasil&action=show&message=verify");
    exit();
  }
}
?>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="card">
        <h5 class="card-header">List Pendaftar</h5>
        <div class="card-body">
          <?php
          $no = 1;
          foreach ($result as $row) : //pengulangan untuk menampilkan data
          ?>
            <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-md-5 col-sm-12">
                  <img src="<?= $row['berkas'] ?>" class="card-img" alt="<?= $row['nama'] ?>" style="object-fit: cover; width: 100%; height: 300px;">
                </div>
                <div class="col-md-7 col-sm-12">
                  <div class="card-body">
                    <div>
                      <?php
                      $status = $row['status'] ? // cek apakah statusnya true
                        '<span class="badge text-bg-success">Sudah Diverifikasi</span>' : // elemen span tampil jika true
                        '<span class="badge text-bg-warning">Belum Diverifikasi</span>'; //elemen span tampil jika false
                      ?>
                      <div class="float-end"><?= $status ?></div>
                      <h5 class="card-title"><?= $row['nama'] ?></h5>
                    </div>
                    <p class="card-text"><strong>Email:</strong> <?= $row['email'] ?></p>
                    <p class="card-text"><strong>No Hp:</strong> <?= $row['no_hp'] ?></p>
                    <p class="card-text"><strong>Semester:</strong> <?= $row['semester'] ?></p>
                    <p class="card-text"><strong>IPK:</strong> <?= $row['ipk'] ?></p>
                    <p class="card-text"><strong>Beasiswa:</strong> <?= $row['beasiswa'] ?></p>
                  </div>
                </div>
              </div>
              <!-- // cek jika memiliki session, maka tampil button aksi -->
              <?php if (isset($_SESSION['username'])) : ?>
                <div class="card-footer text-end">
                  <!-- form hapus data -->
                  <form action="" method="post" class="d-inline">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini??')">Hapus</button>
                  </form>

                  <a class="btn btn-sm btn-warning" href="index.php?page=beasiswa&action=edit&id=<?= $row['id'] ?>">Edit</a>

                  <!-- cek jika status false maka tampil button verifikasi -->
                  <?php if (!$row['status']) : ?>
                    <!-- form varifikasi data -->
                    <form action="" method="post" class="d-inline">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <button type="submit" name="verify" class="btn btn-sm btn-primary" onclick="return confirm('Kamu yakin ingin verifikasi data ini?')">Verifikasi</button>
                    </form>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>