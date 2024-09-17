<div class="container mt-3">
  <div class="row">
    <div class="col-md-12">
      <?php
      $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
      //memanggil parameter message
      if (isset($_GET['message'])) {
        if ($_GET['message'] == 'success') {
          echo "<div class='alert alert-success' role='alert'><strong>Berhasil</strong>! Data berhasil diperbaharui</div>";
        } else if ($_GET['message'] == 'login') {
          echo "<div class='alert alert-success' role='alert'><strong>Berhasil</strong>! Selamat datang {$username} di website pendaftaran beasiswa</div>";
        } else if ($_GET['message'] == 'verify') {
          echo "<div class='alert alert-success' role='alert'><strong>Berhasil</strong>! Data berhasil diverifikasi</div>";
        } else if ($_GET['message'] == 'delete') {
          echo "<div class='alert alert-success' role='alert'><strong>Berhasil</strong>! Data berhasil dihapus</div>";
        } else if ($_GET['message'] == 'error') {
          echo "<div class='alert alert-danger' role='alert'><strong>Gagal</strong>! Username atau password yang anda masukan salah</div>";
        }
      }
      ?>
    </div>
  </div>
</div>