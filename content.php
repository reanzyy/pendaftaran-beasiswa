<?php
//global variabel
@$page = $_GET['page'];
@$aksi = $_GET['action'];

//seleksi page atau halaman yang dipilih oleh pengguna
//menggunakan perkondisian

if (empty($page)) { //jika tidak ada parameter maka viewnya beranda
  require 'beranda.php';
} else { //jika memiliki parameter maka menampilkan view sesuai dengan parametenrya
  $file = 'views/' . $page . '_' . $aksi . '.php';
  if (file_exists($file)) { //jika tidak ditemukan maka tampilan viewnya beranda
    require 'views/' . $page . '_' . $aksi . '.php';
  } else {
    require 'beranda.php';
  }
}
