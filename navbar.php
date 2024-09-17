<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
  <div class="container">
    <a class="navbar-brand" href="#">Pendaftaran Beasiswa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= setActive('beranda') ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= setActive('beasiswa') ?>" href="?page=beasiswa&action=create">Daftar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= setActive('hasil') ?>" href="?page=hasil&action=show">Hasil</a>
        </li>
      </ul>
      <?php
      if (!isset($_SESSION['username'])) { // jika tidak ada sesi, tampilkan link login
        echo '<a class="btn btn-default" href="./login.php">Login</a>';
      } else { // jika ada sesi, tampilkan link logout
        echo '<a class="btn btn-default" href="./logout.php">Logout</a>';
      }
      ?>
    </div>
  </div>
</nav>