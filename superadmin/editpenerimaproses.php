<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$rt = $_POST['rt'];
$status = $_POST['status'];
$ket = $_POST['ket'];
$aktif = $_POST['aktif'];

// update data ke database
mysqli_query($koneksi, "update penerima_santunan set nik='$nik', nama='$nama', jenkel='$jk', tgl_lahir='$tgl_lahir', rtrw='$rt', hp='$hp', status='$status', aktif='$aktif', ket='$ket' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:santunan.php?pesan=ubah");
