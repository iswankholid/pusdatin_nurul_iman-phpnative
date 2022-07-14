<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$rt = $_POST['rt'];
$status = $_POST['status'];
$ket = $_POST['ket'];
$aktif = 'Tidak';

$data = mysqli_query($koneksi, "select * from penerima_santunan where nik='$nik'");
$ceknik = mysqli_num_rows($data);
if ($ceknik > 0) {
    header("location:tambahdatasantunan.php?pesan=gagal");
} else {
    // menginput data ke database
    mysqli_query($koneksi, "insert into penerima_santunan values('','$nik','$nama','$jk','$tgl_lahir','$rt','$hp','$status','$aktif','$ket')");

    // mengalihkan halaman kembali ke index.php
    header("location:santunan.php?pesan=sukses");
}
