<?php
session_start();
session_unset();
session_destroy(); //hapus session yg ada

header('location: login.php'); //back to login
