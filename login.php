<?php
require 'function/authentication.php';
session_start();

//memanggil function login
if (isset($_POST['login'])) {
  if (login($_POST)) {
    echo '<script>window.location.href = "./index.php?message=login"</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <div class="container">
    <?php //mengambil file alert.php
    require 'alert.php';
    ?>
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-5">
        <div class="card">
          <h5 class="card-header">Login</h5>
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group row mb-3">
                <label class="col-lg-3 col-form-label">Username</label>
                <div class="col-lg-9">
                  <input type="text" name="username" class="form-control" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-lg-3 col-form-label">Password</label>
                <div class="col-lg-9">
                  <input type="password" name="password" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <a class="btn btn-secondary" href="./index.php">Kembali</a>
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>