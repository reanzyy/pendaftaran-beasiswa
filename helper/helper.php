<?php

// generate acak angka desimal dengan mengatur var $min and $max
function generateRandomFloat($min, $max)
{
  return $min + mt_rand() / mt_getrandmax() * ($max - $min);
}

//function untuk mendapatkan data semester yg sebelumnya
function getSelectedSemester($semester, $reference)
{
  return $semester == $reference ? 'selected' : '';
}

//function untuk mendapatkan data beasiswa yg sebelumnya
function getSelectedBeasiswa($semester, $reference)
{
  return $semester == $reference ? 'selected' : '';
}

// function untuk mengatur class active pada link nav-item
function setActive($reference)
{
  $page = isset($_GET['page']) ? $_GET['page'] : 'beranda';

  return $page === $reference ? 'active' : '';
}