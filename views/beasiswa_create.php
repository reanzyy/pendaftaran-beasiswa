<?php

// memanggil function store jika user klik button submit
if (isset($_POST['submit'])) {
  if (store($_POST)) {
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
                <input type="text" name="nama" class="form-control" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Email<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <input type="email" name="email" class="form-control" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">No Hp<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <input type="number" name="no_hp" class="form-control" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Semester<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <select name="semester" class="form-control" required>
                  <?php
                  // pengulangan untuk menampilkan angka 1 sampai angka 8
                  foreach (range(1, 8) as $item):
                    echo '<option value="' . $item . '">' . $item . '</option>';
                  endforeach
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">IPK</label>
              <div class="col-lg-9">
                <?php
                $minIpk = 2.9; //atur minimal ipk
                $maxIpk = 3.2; //atur makmial ipk
                $ipk = round(generateRandomFloat($minIpk, $maxIpk), 1); //memanggil ipk dengan format 1 angka dibelakang koma
                ?>
                <input type="hidden" id="ipk" name="ipk" class="form-control" value="<?= $ipk ?>">
                <input type="number" id="ipk" name="ipk" class="form-control" value="<?= $ipk ?>" disabled>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Beasiswa<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <select id="beasiswa" name="beasiswa" class="form-control" required>
                  <option value="akademik">Akademik</option>
                  <option value="non-akademik">Non-akademik</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-3 col-form-label">Berkas<span class="text-danger"> *</span></label>
              <div class="col-lg-9">
                <input type="file" id="berkas" name="berkas" class="form-control" required accept="image/jpeg, image/png">
                <small class="text-danger">upload file dengan format jpg dan png</small>
              </div>
            </div>

          </div>

          <div class="card-footer text-end">
            <span class="text-muted float-start">
              <strong class="text-danger">*</strong> Harus diisi
            </span>
            <a class="btn btn-secondary" href="./index.php?page=hasil&action=show">Kembali</a>
            <button type="submit" name="submit" id="btn-save" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // script menonaktifkan input dengan kondisi
  $(document).ready(function() {
    const ipk = parseFloat($('#ipk').val());
    const beasiswa = $('#beasiswa');
    const berkas = $('#berkas');
    const buttonSimpan = $('#btn-save');

    if (ipk < 3.0) { //jika ipk dibawah 3.0 maka input beasiswa dan berkas di disabled
      beasiswa.prop('disabled', true);
      berkas.prop('disabled', true);
      buttonSimpan.prop('disabled', true);
    }
  });
</script>