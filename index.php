<?php
require 'function/beasiswa.php';
require 'helper/helper.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Beasiswa</title>
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <?php //mengambil file navbar.php
  require 'navbar.php';
  ?>

  <?php //mengambil file alert.php
  require 'alert.php';
  ?>

  <?php //mengambil file content.php
  require 'content.php';
  ?>

  <script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
</body>

</html>