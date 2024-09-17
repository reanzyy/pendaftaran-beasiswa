<?php

$id = $_GET['id']; //mengambil parameter id
$row = query("SELECT * FROM pendaftar WHERE id = $id")[0]; //menampilkan data pendaftar dengan id tertentu

// memanggil function update jika user klik button submit
if (isset($_POST['submit'])) {
  if (update($_POST)) {
    echo '<script>window.location.href = "./index.php?page=hasil&action=show&message=success"</script>';
  }
}
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <form action="" method="post" enctype="multipart/form-data">
          <h5 class="card-header">Pendaftaran</h5>
          <div class="card-body">

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Nama<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>" required>
                <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Email<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">No Hp<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <input type="number" name="no_hp" class="form-control" value="<?= $row['no_hp'] ?>" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Semester<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <select name="semester" class="form-control" required>
                  <?php
                  // pengulangan untuk menampilkan angka 1 sampai angka 8
                  foreach (range(1, 8) as $item):
                    echo '<option value="' . $item . '" ' . getSelectedSemester($item, $row['semester']) . '>' . $item . '</option>';
                  endforeach
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">IPK</label>
              <div class="col-lg-9">
                <input type="hidden" id="ipk" name="ipk" class="form-control" value="<?= $row['ipk'] ?>">
                <input type="number" id="ipk" class="form-control" value="<?= $row['ipk'] ?>" disabled>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Beasiswa<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <select id="beasiswa" name="beasiswa" class="form-control" required>
                  <option value="akademik" <?= getSelectedBeasiswa('akademik', $row['beasiswa']) ?>>Akademik</option>
                  <option value="non-akademik" <?= getSelectedBeasiswa('non-akademik', $row['beasiswa']) ?>>Non-akademik</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Berkas<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <img src="<?= $row['berkas'] ?>" class="img-fluid mb-2" width="200">
                <input type="file" id="berkas" name="berkas" class="form-control" accept="image/jpeg, image/png">
                <small class="text-danger">upload file dengan format jpg dan png</small>
              </div>
            </div>

          </div>

          <div class="card-footer text-end">
            <span class="text-muted float-start">
              <strong class="text-danger">*</strong> Harus diisi
            </span>
            <a class="btn btn-secondary" href="./index.php?page=hasil&action=show">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>