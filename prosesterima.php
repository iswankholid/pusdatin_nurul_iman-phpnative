<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$status = $_POST['status'];
$petugas = 'Panitia Masjid';
$bulan = $_POST['bulan'];

$data = mysqli_query($koneksi, "select * from santunan_bulanan where nik='$nik' and bulan='$bulan'");
$ceknik = mysqli_num_rows($data);
if ($ceknik > 0) {
    header("location:statusterima.php?pesan=gagal");
} else {
    // menginput data ke database
    mysqli_query($koneksi, "insert into santunan_bulanan values('','$nik','$nama','$status','$petugas','$bulan')");

    // mengalihkan halaman kembali ke index.php
    header("location:statusterima.php?pesan=sukses");
}
