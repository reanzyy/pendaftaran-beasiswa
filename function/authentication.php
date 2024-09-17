<?php

$conn = mysqli_connect('localhost', 'root', '', 'ujikom_jwd');

function login($data) //function login
{
  global $conn;

  if (!$conn) {
    echo 'Koneksi ke database gagal: ' . mysqli_connect_error();
    return false;
  }

  $username = $data['username'];
  $password = $data['password'];

  //query untuk mencari data user
  $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query); // menghubungkan koneksi dengan query yg sudah dibuat

  // Periksa apakah user ditemukan
  if (mysqli_num_rows($result) === 1) {
    // Login berhasil    
    $_SESSION['username'] = $data['username'];
    return true;
  } else {
    // Login gagal
    header('location: login.php?message=error');
    return false;
  }
}
