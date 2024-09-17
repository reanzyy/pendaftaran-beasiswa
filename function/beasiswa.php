<?php

//koneksi db
$conn = mysqli_connect('localhost', 'root', '', 'ujikom_jwd');

//function untuk menampilan data
function query($query)
{
  global $conn; // memanggil variabel dari luar function

  $result = mysqli_query($conn, $query);

  $rows = []; //variable array kosong
  while ($row = mysqli_fetch_assoc($result)) { //perulangan untuk mengumpulkan dana 
    $rows[] = $row; //dan ditampung ke dalam array kosong yg sudah dibuat
  }
  return $rows;
}

// function untuk insert data ke dalam db
function store($data)
{
  global $conn;

  // validasi koneksi database
  if (!$conn) {
    echo 'Koneksi ke database gagal: ' . mysqli_connect_error();
    return false;
  }

  //input yg diterima
  $nama = $data['nama'];
  $email = $data['email'];
  $no_hp = $data['no_hp'];
  $semester = $data['semester'];
  $ipk = $data['ipk'];
  $beasiswa = $data['beasiswa'];

  $berkas = "";
  //logic input file
  if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['berkas']['name']);
    if (move_uploaded_file($_FILES['berkas']['tmp_name'], $uploadFile)) { // memindahkan foto yg diinput ke dalam local storage
      $berkas = $uploadFile;
    } else {
      echo 'File upload failed.';
      return false;
    }
  }

  //query insert data pendaftar
  $query = "INSERT INTO pendaftar VALUES('', '$nama', '$email', '$no_hp', '$semester', '$ipk', '$beasiswa', '$berkas', 0)";
  mysqli_query($conn, $query); //function menghubungkan db dengan query

  if (mysqli_affected_rows($conn) > 0) {
    // data berhasil diinput
    return true;
  } else {
    // tampilkan pesan kesalahan jika query gagal
    echo 'Error: ' . mysqli_error($conn);
    return false;
  }
}

function update($data)
{
  global $conn;

  // validasi koneksi database
  if (!$conn) {
    echo 'Koneksi ke database gagal: ' . mysqli_connect_error();
    return false;
  }

  //input yg diterima
  $id = $data['id'];
  $nama = $data['nama'];
  $email = $data['email'];
  $no_hp = $data['no_hp'];
  $semester = $data['semester'];
  $ipk = $data['ipk'];
  $beasiswa = $data['beasiswa'];

  //logic input file
  if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['berkas']['name']);
    if (move_uploaded_file($_FILES['berkas']['tmp_name'], $uploadFile)) { // memindahkan foto yg diinput ke dalam local storage
      $berkas = $uploadFile;
    } else {
      echo 'File upload failed.';
      return false;
    }
  }

  //query update data
  $query = "UPDATE pendaftar SET nama = '$nama', email = '$email', no_hp = '$no_hp', semester = '$semester', ipk = '$ipk', beasiswa = '$beasiswa'";

  if (!empty($berkas)) { //jika berkas yg diinput tidak kosong maka update berkasnya 
    $query .= ", berkas = '$berkas'";
  }

  $query .= " WHERE id = '$id'";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

//function delete data
function delete($data)
{
  global $conn;

  // validasi koneksi database
  if (!$conn) {
    echo 'Koneksi ke database gagal: ' . mysqli_connect_error();
    return false;
  }

  //input yg diterima
  $id = $data['id'];

  //query hapus data
  $query = "DELETE FROM pendaftar WHERE id = '$id'";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
    return true;
  } else {
    // tampilkan pesan kesalahan jika query gagal
    echo 'Error: ' . mysqli_error($conn);
    return false;
  }
}

//function verifikasi data
function verification($data)
{
  global $conn;

  // validasi koneksi database
  if (!$conn) {
    echo 'Koneksi ke database gagal: ' . mysqli_connect_error();
    return false;
  }

  //input yg diterima
  $id = $data['id'];

  //query update data status menjadi true
  $query = "UPDATE pendaftar SET status = 1 WHERE id = '$id'";
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
    return true;
  } else {
    // tampilkan pesan kesalahan jika query gagal
    echo 'Error: ' . mysqli_error($conn);
    return false;
  }
}
